<?php
class PlayersController extends AppController{

	public $uses = ['Informations', 'User', 'shopHistory', 'starpassHistory', 'paypalHistory'];

	public function admin_index(){
		if($this->Auth->user('role') > 0){

		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_whois($username){
		if($this->Auth->user('role') > 0){
			$informations = $this->Informations->find('first');
	    	$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
			if($api->call('players.name', [$username])[0]['result'] == 'success'){
				if($this->User->find('first', ['conditions' => ['User.username' => $username]])){
					$player = $this->User->find('first', ['conditions' => ['User.username' => $username]]);
					$playerId = $player['User']['id'];
					$this->set('player', $this->User->find('first', ['conditions' => ['User.username' => $username]]));
					$this->set('achatsBoutique', $this->shopHistory->find('count', ['conditions' => ['shopHistory.username' => $username]]));
					$this->set('achatsStarpass', $this->starpassHistory->find('count', ['conditions' => ['starpassHistory.username' => $username]]));
					$this->set('achatsPaypal', $this->paypalHistory->find('count', ['conditions' => ['paypalHistory.custom' => $playerId]]));
				}
				else{
					$this->Session->setFlash('Ce joueur n\'est pas inscrit sur le site !', 'error');
					return $this->redirect(['controller' => 'players', 'action' => 'index', 'admin' => true]);
				}
			}
			else{
				$this->Session->setFlash('Ce joueur n\'existe pas ou n\'est pas connecté', 'error');
				return $this->redirect(['controller' => 'players', 'action' => 'index', 'admin' => true]);
			}
	    }
		else{
			throw new NotFoundException();
		}
	}

	public function admin_kick($username = null){
		if($this->Auth->user('role') > 0){
			$informations = $this->Informations->find('first');
    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
    		if($api->call('players.name.kick', [$username, 'Vous avez été kické'])){
	    		$this->Session->setFlash($username.' a été kické du serveur !', 'success');
	    		return $this->redirect($this->referer());
	    	}
	    	else{
	    		$this->Session->setFlash('Erreur', 'error');
	    		return $this->redirect($this->referer());
	    	}
	    }
		else{
			throw new NotFoundException();
		}
	}

	public function admin_clear($username = null){
		if($this->Auth->user('role') > 0){
			$informations = $this->Informations->find('first');
    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
    		if($api->call('server.run_command', ['clear '.$username])){
	    		$this->Session->setFlash('L\'inventaire de '.$username.' a été supprimé !', 'success');
	    		return $this->redirect($this->referer());
	    	}
	    	else{
	    		$this->Session->setFlash('Erreur', 'error');
	    		return $this->redirect($this->referer());
	    	}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_ban($username = null){
		if($this->Auth->user('role') > 0){
			$informations = $this->Informations->find('first');
    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
    		if($api->call('server.run_command', ['ban '.$username.' Vous avez été banni'])){
	    		$this->Session->setFlash($username.' a été banni du serveur !', 'success');
	    		return $this->redirect($this->referer());
	    	}
	    	else{
	    		$this->Session->setFlash('Erreur', 'error');
	    		return $this->redirect($this->referer());
	    	}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_banip($username = null){
		if($this->Auth->user('role') > 0){
			$informations = $this->Informations->find('first');
    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
    		if($api->call('server.run_command', ['banip '.$username])){
	    		$this->Session->setFlash($username.' a été ban IP du serveur !', 'success');
	    		return $this->redirect($this->referer());
	    	}
	    	else{
	    		$this->Session->setFlash('Erreur', 'error');
	    		return $this->redirect($this->referer());
	    	}
		}
		else{
			throw new NotFoundException();
		}
	}
}