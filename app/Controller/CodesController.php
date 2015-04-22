<?php
Class CodesController extends AppController{

	public $uses = ['Code', 'User', 'Informations'];

	public function index(){
		if($this->Auth->user('role' > 0)){
			return $this->redirect(['controller' => 'codes', 'action' => 'create', 'admin' => true]);
		}
		else{
			return $this->redirect($this->referer());
		}
	}

	public function admin_index(){
		if($this->Auth->user('role' > 0)){
			return $this->redirect(['controller' => 'codes', 'action' => 'create', 'admin' => true]);
		}
		else{
			return $this->redirect($this->referer());
		}
	}

	public function admin_generate(){
		if($this->request->is('post')){
			$user_id = $this->Auth->user('id');
			$ip = $_SERVER['REMOTE_ADDR'];
			$value = $this->request->data['Codes']['value'];
			$number = $this->request->data['Codes']['number'];
			if($number == null){
				$number = 1;
			}
			for($i = 1; $i <= $number; $i++){
				// On génère un code
				$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
				$random = str_shuffle($char);
				$random2 = str_shuffle($char);
				$random3 = str_shuffle($char);
				$random4 = str_shuffle($char);
				$code = substr($random, 0, 4).'-'.substr($random2, 0, 4).'-'.substr($random3, 0, 4).'-'.substr($random4, 0, 4);
				// On l'enregistre
				$this->Code->create;
				$this->Code->saveField('user_id', $user_id);
				$this->Code->saveField('ip', $ip);
				$this->Code->saveField('code', $code);
				$this->Code->saveField('value', $value);
				$this->Code->saveField('used', 0);
				$this->Code->saveField('by', '');
				$this->Code->clear();
			}
			// On redirige
			$this->Session->setFlash('Votre code a bien été créé !', 'success');
			return $this->redirect(['controller' => 'codes', 'action' => 'list', 'admin' => true]);
		}
	}

	public function admin_list(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Code->find('all', ['order' => ['Code.id' => 'DESC']]));
		}
		else{
			throw new NotFoundException();			
		}
	}

	public function admin_delete($id){
		if($this->Auth->user('role') > 0){
			$this->Code->delete($id);
			$this->Session->setFlash('Ce code a été supprimé', 'success');
			return $this->redirect(['controller' => 'codes', 'action' => 'list', 'admin' => true]);
		}
		else{
			throw new NotFoundException();			
		}
	}

	public function consume(){
		if($this->Auth->user()){
			$informations = $this->Informations->find('first');
			$site_money = $informations['Informations']['site_money'];
			if($this->request->is('post')){
				$code = $this->request->data['Codes']['code'];
				// Si ce code existe
				if($this->Code->findByCode($code)){
					$infos = $this->Code->findByCode($code);
					$id = $infos['Code']['id'];
					$used = $infos['Code']['used'];
					$value = $infos['Code']['value'];
					// S'il n'est pas déjà utilisé
					if($used == 0){
						// On utilise le code
						$this->Code->id = $id;
						$this->Code->saveField('used', 1);
						$this->Code->saveField('by', $this->Auth->user('username'));
						// On va chercher les infos de l'utilisateur
						$user = $this->User->find('first', ['conditions' => ['User.id' => $this->Auth->user('id')]]);
						// On récupère son nombre de tokens actuels
						$user_tokens = $user['User']['tokens'];
						// On définit son nouveau nombre de tokens
						$new_user_tokens = $user_tokens + $value;
						// On le sauvegarde
						$this->User->id = $this->Auth->user('id');
						$this->User->saveField('tokens', $new_user_tokens);
						// Et on redirige
						$this->Session->setFlash('Votre avez été crédité de '.$value.' '.$site_money.' !', 'success');
						return $this->redirect(['controller' => 'shops', 'action' => 'reload', 'admin' => false]);
					}
					else{
						$this->Session->setFlash('Ce code a déjà été utilisé !', 'error');
						return $this->redirect(['controller' => 'shops', 'action' => 'reload', 'admin' => false]);
					}
				}
				else{
					$this->Session->setFlash('Code erroné', 'error');
					return $this->redirect(['controller' => 'shops', 'action' => 'reload', 'admin' => false]);
				}
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}
}