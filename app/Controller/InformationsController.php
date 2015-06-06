<?php
class InformationsController extends AppController{

	public function admin_index(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Informations->find('first', ['conditions' => ['Informations.id' => 1]]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_updateInformations(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('post')){
				$this->Informations->id = 1;
				if(isset($this->request->data['Informations']['send_tokens_loss_rate'])){
					$send_tokens_loss_rate = $this->request->data['Informations']['send_tokens_loss_rate'];
					if($send_tokens_loss_rate < 0){
						$this->request->data['Informations']['send_tokens_loss_rate'] = 0;
					}
					if($send_tokens_loss_rate > 100){
						$this->request->data['Informations']['send_tokens_loss_rate'] = 100;
					}
				}
				if($this->Informations->save($this->request->data)){
					$this->Session->setFlash('Configuration mise à jour !', 'success');
				}
				return $this->redirect(['controller' => 'informations', 'action' => 'index']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_testJsonapi(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('ajax')){
		    	$api = new JSONAPI($this->request->data['ip'], $this->request->data['port'], $this->request->data['username'], $this->request->data['password'], $this->request->data['salt']);
				if($api->call('players.online.limit')[0]['result'] == 'success'){
					$result = 'success';
				}
				else{
					$result = 'failure';
				}
				echo json_encode(['result' => $result]);
				exit();
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_updateOptions(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('post')){
				$this->Informations->id = 1;
				if(isset($this->request->data['use_slider'])){
					$this->Informations->saveField('use_slider', 1);
				}
				else{
					$this->Informations->saveField('use_slider', 0);
				}
				if(isset($this->request->data['use_store'])){
					$this->Informations->saveField('use_store', 1);
				}
				else{
					$this->Informations->saveField('use_store', 0);
				}
				if(isset($this->request->data['use_donation_ladder'])){
					$this->Informations->saveField('use_donation_ladder', 1);
				}
				else{
					$this->Informations->saveField('use_donation_ladder', 0);
				}
				if(isset($this->request->data['use_paypal'])){
					$this->Informations->saveField('use_paypal', 1);
				}
				else{
					$this->Informations->saveField('use_paypal', 0);
				}
				if(isset($this->request->data['use_economy'])){
					$this->Informations->saveField('use_economy', 1);
				}
				else{
					$this->Informations->saveField('use_economy', 0);
				}
				if(isset($this->request->data['use_server_money'])){
					$this->Informations->saveField('use_server_money', 1);
				}
				else{
					$this->Informations->saveField('use_server_money', 0);
				}
				if(isset($this->request->data['use_team'])){
					$this->Informations->saveField('use_team', 1);
				}
				else{
					$this->Informations->saveField('use_team', 0);
				}
				if(isset($this->request->data['use_contact'])){
					$this->Informations->saveField('use_contact', 1);
				}
				else{
					$this->Informations->saveField('use_contact', 0);
				}
				if(isset($this->request->data['use_rules'])){
					$this->Informations->saveField('use_rules', 1);
				}
				else{
					$this->Informations->saveField('use_rules', 0);
				}
				if(isset($this->request->data['happy_hour'])){
			    	$api = new JSONAPI($this->infos['jsonapi_ip'], $this->infos['jsonapi_port'], $this->infos['jsonapi_username'], $this->infos['jsonapi_password'], $this->infos['jsonapi_salt']);
					$api->call('server.run_command', ['say Happy hour ! Rendez-vous sur le site. '.$this->infos['happy_hour_bonus'].'% de '.$this->infos['site_money'].' offerts ! (http://'.$_SERVER['HTTP_HOST'].$this->webroot.'recharger)']);
					$this->Informations->saveField('happy_hour', 1);
				}
				else{
					$this->Informations->saveField('happy_hour', 0);
				}
				if(isset($this->request->data['maintenance'])){
					$this->Informations->saveField('maintenance', 1);
				}
				else{
					$this->Informations->saveField('maintenance', 0);
				}
				$this->Session->setFlash('Options mises à jour !', 'success');
				return $this->redirect(['controller' => 'informations', 'action' => 'index']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_background(){
		if($this->Auth->user('role') > 0){
			
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_update_background($background){
		if($this->Auth->user('role') > 0){
			$this->Informations->id = 1;
			$this->Informations->saveField('background', $background);
			$this->Session->setFlash('Background mis à jour !', 'success');
			return $this->redirect(['controller' => 'informations', 'action' => 'background']);
		}
		else{
			throw new NotFoundException();
		}
	}
}