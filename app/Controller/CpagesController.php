<?php
class CpagesController extends AppController {

	public function admin_index(){
		if($this->Auth->user('role') > 1){
			return $this->redirect(['controller' => 'cpages', 'action' => 'add']);
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_add(){
		if($this->Auth->user('role') > 1){
			if($this->request->is('post')){
				$this->Cpage->create;
				$this->Cpage->saveField('user_id', $this->Auth->user('id'));
				$this->Cpage->saveField('name', $this->request->data['Cpages']['name']);
				if(isset($this->request->data['Cpages']['sidebar'])){
					$this->Cpage->saveField('sidebar', $this->request->data['Cpages']['sidebar']);
				}
				$this->Cpage->saveField('slug', $this->request->data['Cpages']['slug']);
				$this->Cpage->saveField('content', $this->request->data['Cpages']['content']);
				$this->Session->setFlash('Page créée avec succès !', 'success');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_list(){
		if($this->Auth->user('role') > 1){
			$this->set('data', $this->Cpage->find('all'));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_delete($id){
		if($this->Auth->user('role') > 1){
			if($this->Cpage->findById($id)){
				$this->Cpage->delete($id);
				$this->Session->setFlash('Page supprimée !', 'success');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
			else{
				$this->Session->setFlash('Cette page n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_edit($id){
		if($this->Auth->user('role') > 1){
			if($this->Cpage->findById($id)){
				$this->set('data', $this->Cpage->find('first', ['conditions' => ['Cpage.id' => $id]]));
				if($this->request->is('post')){
					$this->Cpage->id = $id;
					$this->Cpage->saveField('name', $this->request->data['Cpages']['name']);
					if(isset($this->request->data['Cpages']['sidebar'])){
						$this->Cpage->saveField('sidebar', $this->request->data['Cpages']['sidebar']);
					}
					$this->Cpage->saveField('slug', $this->request->data['Cpages']['slug']);
					$this->Cpage->saveField('content', $this->request->data['Cpages']['content']);
					$this->Session->setFlash('Page éditée !', 'success');
					return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
				}
			}
			else{
				$this->Session->setFlash('Cette page n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function read($slug){
		if($this->Cpage->findBySlug($slug)){
			// JSONAPI
			$api = new JSONAPI($this->config['jsonapi_ip'], $this->config['jsonapi_port'], $this->config['jsonapi_username'], $this->config['jsonapi_password'], $this->config['jsonapi_salt']);
			// On récupère le groupe du joueur, return NULL si impossible
			$group = $api->call('worlds.world.players.player.chat.groups.primary', ['world', $this->Auth->user('username')])[0]['success'];
			// On test si l'utilisateur est connecté en jeu
			$online_players = $api->call('players.online.names');
			$player_is_online = in_array($this->Auth->user('username'), $online_players[0]['success']);
			// On génère l'url de connexion
			$login = Router::url(['controller' => 'users', 'action' => 'login']);
			// On génère l'ip du serveur
			$ip_port = $this->config['ip_server'].':'.$this->config['port_server'];
			// On récupère les données
			$data = $this->Cpage->find('first', ['conditions' => ['Cpage.slug' => $slug]]);
			$content = $data['Cpage']['content'];
			// Si ce pattern existe, on le supprime
			$content = preg_replace("/\[\[\{\{(.*?)\}\}\]\]/i", "$1", $content);
			$content = preg_replace("/\{\{\[\[(.*?)\]\]\}\}/i", "$1", $content);
			// Si on n'est connecté ni au site, ni au jeu
			if(!$this->Auth->user() && !$player_is_online){
				$content = preg_replace("/\{\{(.*?)\}\}/i", "<a href='$login'>[Vous devez être connecté pour voir ceci]</a>", $content);
				$content = preg_replace("/\[\[(.*?)\]\]/i", "<a href='$login'>[Vous devez être connecté au site, et au jeu pour voir ceci]</a>", $content);
			}
			// Si on n'est pas connecté en jeu
			elseif($this->Auth->user() && !$player_is_online){
				$content = preg_replace("/\{\{(.*?)\}\}/i", "$1", $content);
				$content = preg_replace("/\[\[(.*?)\]\]/i", "<a href='$login'>[Vous devez être connecté au site, et au jeu pour voir ceci]</a>", $content);
			}
			// Sinon on est connecté partout, on affiche tout
			else{
				$content = preg_replace("/\{\{(.*?)\}\}/i", "$1", $content);
				$content = preg_replace("/\[\[(.*?)\]\]/i", "$1", $content);
			}
			if($group != null){
				$content = str_replace('%groupe%', $group, $content);
			}
			$content = str_replace('%pseudo%', $this->Auth->user('username'), $content);
			$content = str_replace('%email%', $this->Auth->user('email'), $content);
			$content = str_replace('%tokens%', $this->Auth->user('tokens'), $content);
			$content = str_replace('%ip_port%', $ip_port, $content);
			$content = str_replace('%ip%', $this->config['ip_server'], $content);
			$content = str_replace('%port%', $this->config['port_server'], $content);
            $this->set('content', $content);
			$this->set('data', $data);
		}
		else{
			throw new NotFoundException();
		}
	}
}