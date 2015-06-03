<?php
Class PluginsController extends AppController{

	public function admin_index(){
		if($this->Auth->user('role') > 0){
			
		}
		else{
			throw new NotFoundException();
		}
	}

	// public function admin_enabled($name){
	// 	if($this->Auth->user('role') > 0){
	// 		$api = new JSONAPI($this->infos['jsonapi_ip'], $this->infos['jsonapi_port'], $this->infos['jsonapi_username'], $this->infos['jsonapi_password'], $this->infos['jsonapi_salt']);
	// 		$api->call('plugins.name.enable', [$name]);
	// 		$this->Session->setFlash($name.' a été activé !', 'success');
	// 		$this->redirect($this->referer());
	// 	}
	// 	else{
	// 		throw new NotFoundException();
	// 	}
	// }

	// public function admin_disabled($name){
	// 	if($this->Auth->user('role') > 0){
	// 		$api = new JSONAPI($this->infos['jsonapi_ip'], $this->infos['jsonapi_port'], $this->infos['jsonapi_username'], $this->infos['jsonapi_password'], $this->infos['jsonapi_salt']);
	// 		$api->call('plugins.name.disabled', [$name]);
	// 		$this->Session->setFlash($name.' a été désactivé !', 'success');
	// 		$this->redirect($this->referer());
	// 	}
	// 	else{
	// 		throw new NotFoundException();
	// 	}
	// }
}