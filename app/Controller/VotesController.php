<?php
Class VotesController extends AppController{

	public $uses = ['Vote', 'User', 'Informations'];

	public function index(){
		if($this->Auth->user()){
			$nb_votes = $this->User->find('first', ['conditions' => ['User.id' => $this->Auth->user('id')]]);
			$nb_votes = $nb_votes['User']['votes'];
			$this->set('nb_votes', $nb_votes);
			if($this->config['use_votes_ladder'] == 1){
				$data = $this->User->find('all', ['conditions' => ['User.role = 0'], 'order' => ['User.votes DESC'], 'limit' => 5]);
				$this->set('data', $data);
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login']);
		}
	}

	public function vote(){
		// Si l'utilisateur est connecté
		if($this->Auth->user()){
			// On met time dans une variable
			$time = time();
			// On récupère les infos depuis la base de données
			$vote = $this->Vote->find('first', ['conditions' => ['Vote.user_id' => $this->Auth->user('id')], 'order' => ['Vote.created' => 'DESC']]);
			$next_vote = $vote['Vote']['next_vote'];
			$nb_votes = $this->Vote->find('count', ['conditions' => ['Vote.user_id' => $this->Auth->user('id')]]);
			// Temps avant de revoter en secondes
			$time_to_vote_in_seconds = $this->config['votes_time'] * 60;
			$time_to_vote_in_seconds = $time + $time_to_vote_in_seconds;
			// Temps avant de revoter en minutes
			$time_to_vote_in_minutes = $next_vote - $time;
			$time_to_vote_in_minutes = $time_to_vote_in_minutes / 60;
			$time_to_vote_in_minutes = round($time_to_vote_in_minutes);
			// Si on n'a jamais voté ou si le temps nécessaire avant un nouveau vote s'est écoulé
			if($nb_votes == 0 OR $time >= $next_vote){
				// On enregistre le nouveau vote
				$this->Vote->create;
				$this->Vote->saveField('user_id', $this->Auth->user('id'));
				$this->Vote->saveField('ip', $_SERVER['REMOTE_ADDR']);
				$this->Vote->saveField('next_vote', $time_to_vote_in_seconds);
				// On l'ajoute dans la table users
				$this->User->id = $this->Auth->user('id');
				$user = $this->User->find('first');
				$user_vote = $user['User']['votes'] + 1;
				$this->User->saveField('votes', $user_vote);
				// S'il y a une récompense à octroyer
				if($this->config['votes_reward'] != 0){
					// On récupère les infos de l'utilisateur
					$user = $this->User->find('first', ['conditions' => ['User.id' => $this->Auth->user('id')]]);
					$user_tokens = $user['User']['tokens'];
					// On définit son nouveau nb de tokens
					$new_user_tokens = $user_tokens + $this->config['votes_reward'];
					// On sauvegarde
					$this->User->id = $this->Auth->user('id');
					$this->User->saveField('tokens', $new_user_tokens);
					$this->Vote->saveField('reward', $this->config['votes_reward']);
				}
				// S'il y a une/des commande(s) à exécuter
				if(!empty($this->config['votes_command'])){
					// JSONAPI
					$api = new JSONAPI($this->config['jsonapi_ip'], $this->config['jsonapi_port'], $this->config['jsonapi_username'], $this->config['jsonapi_password'], $this->config['jsonapi_salt']);
					// On exécute la/les commande(s)
					$command = str_replace('%player%', $this->Auth->user('username'), $this->config['votes_command']);
					if(strstr($this->config['votes_command'], '&&&')){
						$new_command = explode('&&&', $command);
						foreach($new_command as $command){
							$command = trim($command);
							$api->call('server.run_command', [$command]);
						}
					}
					else{
						$api->call('server.run_command', [$command]);
					}
				}
				// On redirige vers la page de vote
				$this->Session->setFlash("Merci d'avoir voté !", 'success');
				return $this->redirect(['controller' => 'votes', 'action' => 'index']);
			}
			// Sinon on a déjà voté
			else{
				$this->Session->setFlash('Vous avez déjà voté, vous devez encore attendre '.$time_to_vote_in_minutes.' minutes', 'error');
				return $this->redirect(['controller' => 'votes', 'action' => 'index']);
			}
		// Si on n'est pas connecté
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login']);
		}
	}

	public function ladder(){
		if($this->config['use_votes_ladder'] == 1){
			$data = $this->User->find('all', ['conditions' => ['User.role = 0'], 'order' => ['User.votes DESC'], 'limit' => $this->config['votes_ladder_limit']]);
			$this->set('data', $data);
		}
		else{
			throw new NotFoundException();
		}
	}
}