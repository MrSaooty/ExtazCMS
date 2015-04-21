<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('AYAH', 'Lib/AYAH');

class UsersController extends AppController{

    public $uses = ['User', 'Informations', 'donationLadder'];

	public function beforeFilter(){
	    parent::beforeFilter();
        $this->Auth->allow();
	}

    public function index(){
        return $this->redirect($this->referer());
    }

	public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->Session->setFlash('Vous êtes maintenant connecté '.$this->Auth->user('username').'', 'success');
                return $this->redirect($this->Auth->redirect(array('controller' => 'posts', 'action' => 'index')));
            }
            else{
                $this->Session->setFlash('Pseudo ou mot de passe invalide, vous pouvez réessayer', 'error');
            }
        }
	}

	public function logout(){
	    $this->Auth->logout();
        return $this->redirect($this->referer());
	}

    public function signup(){
        if($this->Auth->loggedIn()){
            $this->redirect($this->Auth->redirect(array('controller' => 'posts', 'action' => 'index')));
        }
        else{
            $ayah = new AYAH();
            $this->set('ayah', $ayah);
            if($this->request->is('post')){
                if(array_key_exists('captcha', $this->request->data)){
                    $score = $ayah->scoreResult();
                    if($score){
                        $this->User->set($this->request->data);
                        $password = $this->request->data['User']['password'];
                        $password_confirmation = $this->request->data['User']['password_confirmation'];
                        $nbAccount = $this->User->find('count');
                        if($password == $password_confirmation){
                            if($this->User->validates()){
                                $this->User->create();
                                if($this->User->save($this->request->data)){
                                    $this->User->saveField('tokens', '0');
                                    $this->User->saveField('allow_email', '1');
                                    if($nbAccount == 0){
                                        $this->User->saveField('role', '1');
                                    }
                                    else{
                                        $this->User->saveField('role', '0');
                                    }
                                    $this->Session->setFlash('Inscription réussie vous pouvez maintenant vous connecter', 'success');
                                    return $this->redirect(array('action' => 'login'));
                                }
                                else{
                                    $this->Session->setFlash('Un problème est survenu !', 'error');
                                }
                            }
                            else{
                                $this->Session->setFlash('Un problème est survenu !', 'error');
                            }
                        }
                        else{
                            $this->Session->setFlash('Les mots de passe ne correspondent pas', 'error');
                        }
                    }
                    else{
                        $this->Session->setFlash('Erreur 1001', 'error');
                    }
                }
            }
        }
    }

    public function profile($username = null){
        if($this->User->find('first', ['conditions' => ['User.username' => $username]])){
            $this->set('data', $this->User->find('first', ['conditions' => ['User.username' => $username]]));
        }
        else{
            throw new NotFoundException();
        }
    }

    public function account(){
        if($this->Auth->user()){
            $this->set('data', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id')))));
        }
        else{
            $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
    }

    public function update_account(){
        if($this->Auth->user()){
            $password = $this->request->data['User']['password'];
            $password_confirmation = $this->request->data['User']['password_confirmation'];
            if(!empty($password) && !empty($password_confirmation)){
            	if($password == $password_confirmation){
	                if(strlen($password) >= 6){
	                    $id = $this->Auth->user('id');
	                    $this->User->id = $id;
	                    $this->User->saveField('password', $password);
	                    $this->Session->setFlash('Mot de passe modifié avec succès !', 'success');
	                    $this->redirect(array('controller' => 'users', 'action' => 'account'));
	                }
	                else{
	                    $this->Session->setFlash('Le mot de passe doit contenir 6 caractères minimum', 'error');
	                    $this->redirect(array('controller' => 'users', 'action' => 'account'));
	                }
	            }
	            else{
	                $this->Session->setFlash('Les mots de passe ne correspondent pas', 'error');
	                $this->redirect(array('controller' => 'users', 'action' => 'account'));
	            }
            }
            else{
            	$id = $this->Auth->user('id');
                $this->User->id = $id;
                if(isset($this->request->data['allow_email'])){
					$this->User->saveField('allow_email', 1);
				}
				else{
					$this->User->saveField('allow_email', 0);
				}
                $this->Session->setFlash('Informations modifié avec succès !', 'success');
                $this->redirect(array('controller' => 'users', 'action' => 'account'));
            }         
        }
        else{
            $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
    }

    public function forgot_password(){
        if($this->Auth->user()){
            $this->redirect(['controller' => 'posts', 'action' => 'index']);
        }
        else{
            if($this->request->is('post')){
                $email = $this->request->data['User']['email'];
                if($this->User->findByEmail($email)){
                    $newPassword = strtoupper(substr(md5(uniqid(rand(), true)), 0, 10));
                    $data = $this->User->find('first', array('conditions' => array('User.email' => $email)));
                    $this->User->id = $data['User']['id'];
                    $this->User->saveField('password', $newPassword);
                    $informations = $this->Informations->find('first');
                    $name_server = $informations['Informations']['name_server'];
                    $name_server = strtolower(preg_replace('/\s/', '', $name_server));
                    $Email = new CakeEmail();
                    $Email->from(array('admin@'.$name_server.'.com' => $name_server));
                    $Email->to($email);
                    $Email->subject('Mot de passe oublié');
                    $Email->send('Voici votre nouveau mot de passe : '.$newPassword);
                    $this->Session->setFlash('Email envoyé !', 'success');
                }
                else{
                    $this->Session->setFlash('Cette adresse email n\'existe pas dans notre base de données', 'error');
                }
            }
        }
    }

    public function admin_delete($id = null){
        if($this->Auth->user('role') > 0){
            $this->User->id = $id;
            if($this->User->exists()){
                if($this->User->delete($id)){
                    $this->donationLadder->deleteAll(['donationLadder.user_id' => $id]);
                    $this->Session->setFlash('Utilisateur supprimé !', 'success');
                    return $this->redirect(['controller' => 'users', 'action' => 'all']);
                }
                else{
                    $this->Session->setFlash('Un problème est survenu', 'error');
                    return $this->redirect($this->referer());
                }
            }
            else{
                $this->Session->setFlash('Cet utilisateur n\'existe pas !', 'error');
                return $this->redirect($this->referer());
            }
        }
        else{
            throw new NotFoundException();
        }
    }

    public function admin_edit($id = null){
        if($this->Auth->user('role') > 0){
            $this->User->id = $id;
            if($this->User->exists()){
                $this->set('data', $this->User->find('first', ['conditions' => ['User.id' => $id]]));
                if($this->request->is('post')){
                    $this->User->id = $id;
                    if($this->User->save($this->request->data, ['validate' => false])){
                        $this->Session->setFlash('Utilisateur modifié !', 'success');
                        return $this->redirect(['controller' => 'users', 'action' => 'edit', $id]);
                    }
                    else{
                        $this->Session->setFlash('Un problème est survenu', 'error');
                        return $this->redirect(['controller' => 'users', 'action' => 'edit', $id]);
                    }
                }
            }
            else{
                $this->Session->setFlash('Cet utilisateur n\'existe pas !', 'error');
                return $this->redirect($this->referer());
            }
        }
    }

    public function manage(){
        if($this->Auth->user('role') > 0){

        }
        else{
            throw new NotFoundException();
        }
    }

    public function admin_all(){
        if($this->Auth->user('role') > 0){
            $this->set('data', $this->User->find('all', ['order' => ['User.tokens' => 'DESC']]));
        }
        else{
            throw new NotFoundException();
        }
    }
}