<?php
Class CodesController extends AppController{

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
			$author = $this->Auth->user('username');
			$ip = $_SERVER['REMOTE_ADDR'];
			$value = $this->request->data['Codes']['value'];
			// On génère un code
			$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$random = str_shuffle($char);
			$random2 = str_shuffle($char);
			$random3 = str_shuffle($char);
			$random4 = str_shuffle($char);
			$code = substr($random, 0, 4).'-'.substr($random2, 0, 4).'-'.substr($random3, 0, 4).'-'.substr($random4, 0, 4);
			// On l'enregistre
			$this->Code->create;
			$this->Code->saveField('author', $author);
			$this->Code->saveField('ip', $ip);
			$this->Code->saveField('code', $code);
			$this->Code->saveField('value', $value);
			$this->Code->saveField('used', 0);
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

	}

	// public function use(){
		
	// }
}