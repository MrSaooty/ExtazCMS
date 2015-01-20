<?php
class PostsController extends AppController{

	public $uses = array('Post', 'Informations', 'Like');

	var $paginate = array(
		'Post' => array(
			'conditions' => array('Post.visible' => 1, 'Post.draft' => 0),
			'limit' => 6,
			'order' => array(
				'Post.posted' => 'DESC'
			),
			'paramType'=> 'named'
		));

	public function index(){
		// Pagination
		$q = $this->paginate('Post');
		$this->set('articles', $q);
		// Nombre d'article visible & non draft
		$this->set('nbPost', $this->Post->find('count', array('conditions' => array('Post.visible' => 1, 'Post.draft' => 0))));
	}

	public function read($slug, $id){
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') == 0){
			// Si l'article ciblé existe, on va le chercher même si c'est un brouillon
			if($this->Post->find('all', array('conditions' => array('Post.id' => $id, 'Post.slug' => $slug, 'Post.visible' => 1, 'Post.draft' => 0)))){
				$this->set('post', $this->Post->find('first', array('conditions' => array('Post.id' => $id, 'Post.slug' => $slug, 'Post.visible' => 1, 'Post.draft' => 0))));
				$this->set('lastPosts', $this->Post->find('all', array('conditions' => array('Post.visible' => 1, 'Post.draft' => 0), 'order' => array('Post.posted' => 'DESC'))));
				$this->set('liked', $this->Like->find('all', array('conditions' => array('Like.id_article' => $id, 'Like.ip' => $_SERVER['REMOTE_ADDR']))));
				$this->set('nbLikes', $this->Like->find('count', array('conditions' => array('Like.id_article' => $id))));
			}
			// Si l'article ciblé n'existe pas, erreur 404
			else{
				throw new NotFoundException();
			}
		}
		// Si c'est un utilisateur
		else{
			// Si l'article ciblé existe, on va le chercher mais pas si c'est un brouillon
			if($this->Post->find('all', array('conditions' => array('Post.id' => $id, 'Post.slug' => $slug, 'Post.visible' => 1)))){
				$this->set('post', $this->Post->find('first', array('conditions' => array('Post.id' => $id, 'Post.slug' => $slug, 'Post.visible' => 1))));
				$this->set('lastPosts', $this->Post->find('all', array('conditions' => array('Post.visible' => 1, 'Post.draft' => 0), 'order' => array('Post.posted' => 'DESC'))));
				$this->set('liked', $this->Like->find('all', array('conditions' => array('Like.id_article' => $id, 'Like.ip' => $_SERVER['REMOTE_ADDR']))));
				$this->set('nbLikes', $this->Like->find('count', array('conditions' => array('Like.id_article' => $id))));
			}
			// Si l'article ciblé n'existe pas, erreur 404
			else{
				throw new NotFoundException();
			}
		}
	}

	public function admin_add(){
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') > 0){
			// Si le formulaire à été posté
			if($this->request->is('post')){
				// On envoie les data au model
				$this->Post->set($this->request->data);
				// Si les rdv sont respectées
				if($this->Post->validates()){
					// Si une image a été postée
					if(!empty($this->request->data['Post']['img']) OR !empty($this->request->data['Post']['img_file']['tmp_name'])){
						// On enregistre les données
						$this->Post->save($this->request->data);
						$slug = strtolower($this->request->data['Post']['slug']);
						$this->Post->saveField('slug', $slug);
						$this->Post->saveField('author', $this->Auth->user('username'));
						$this->Post->saveField('likes', 0);
						$this->Post->saveField('ip', $_SERVER['REMOTE_ADDR']);
						$this->Post->saveField('progress', 0);
						$this->Post->saveField('visible', 1);
						$this->Post->saveField('draft', 1);
						$this->Post->saveField('corrected', 0);
						$this->Post->saveField('posted', 0);
						$this->Session->setFlash('Article enregistré en tant que brouillon !', 'success');
						return $this->redirect(array('controller' => 'posts', 'action' => 'drafts'));
					}
					// Si aucune image n'est postée
					else{
						$this->Session->setFlash('Vous devez mettre une image', 'error');
					}
				}
				// Si les rdv ne sont pas respectées
				else{
					$this->Session->setFlash('Une erreur est survenue !', 'error');
				}
			}
		}
		// Si c'est une utilisateur
		else{
			throw new NotFoundException();
		}
	}	

	public function admin_edit($id = null){
		$this->set('data', $this->Post->findById($id));
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') > 0){
			// Si l'article existe
			if($this->Post->findById($id)){
				$corrected = $this->Post->find('count', ['conditions' => ['Post.id' => $id, 'Post.corrected' => 1]]);
				// Sauvegarde automatique
				if($this->request->is('ajax')){
					$this->Post->id = $this->request->data['id'];
					$slug = strtolower($this->request->data['slug']);
					$this->Post->saveField('title', $this->request->data['title']);
					$this->Post->saveField('slug', $slug);
					$this->Post->saveField('progress', $this->request->data['progress']);
					$this->Post->saveField('cat', $this->request->data['cat']);
					$this->Post->saveField('content', $this->request->data['content']);
					exit();
				}
				// Si c'est une édition
				elseif($this->request->is('post')){
					// On envoie les data au model
					$this->Post->set($this->request->data);
					// Si les rdv sont respectées
					if($this->Post->validates()){
						// Si l'image n'a pas changée
						if(!empty($this->request->data['Post']['img']) OR !empty($this->request->data['Post']['img_file']['tmp_name'])){
							$this->Post->id = $id;
							$this->Post->save($this->request->data);
							$slug = strtolower($this->request->data['Post']['slug']);
							$this->Post->saveField('slug', $slug);
							$this->Session->setFlash('Article modifié !', 'success');
							return $this->redirect(['controller' => 'posts', 'action' => 'index']);
						}
						// Si l'image a été changée
						else{
							$this->Post->id = $id;
							$slug = strtolower($this->request->data['Post']['slug']);
							$this->Post->saveField('title', $this->request->data['Post']['title']);
							$this->Post->saveField('cat', $this->request->data['Post']['cat']);
							$this->Post->saveField('slug', $slug);
							$this->Post->saveField('progress', $this->request->data['Post']['progress']);
							$this->Post->saveField('content', $this->request->data['Post']['content']);
							$this->Session->setFlash('Article modifié !', 'success');
							return $this->redirect(['controller' => 'posts', 'action' => 'index']);
						}
					}
					// Si les rdv ne sont pas respectées
					else{
						$this->Session->setFlash('Une erreur est survenue !', 'error');
					}
				}
			}
			// Si l'article n'existe pas
			else{
				$this->Session->setFlash('Cet article n\'existe pas, impossible de le modifier', 'error');
				return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
		}
		// Si c'est un utilisateur
		else{
			throw new NotFoundException();
		}
	}

	public function admin_drafts(){
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') > 0){
			// On va chercher les brouillons
			$this->set('drafts', $this->Post->find('all', array('conditions' => array('Post.visible' => 1, 'Post.draft' => 1), 'order' => array('Post.created' => 'DESC'))));
		}
		// Si c'est un utilisateur
		else{
			throw new NotFoundException();
		}
	}

	public function admin_list(){
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') > 0){
			// On va chercher les brouillons
			$this->set('data', $this->Post->find('all', array('conditions' => array('Post.visible' => 1), 'order' => array('Post.created' => 'DESC'))));
		}
		// Si c'est un utilisateur
		else{
			throw new NotFoundException();
		}
	}

	public function delete($id = null){
		// Si c'est un utilisateur spécial
		if($this->Auth->user('role') > 0){
			// Si l'article existe
			if($this->Post->findById($id)){
				// On défini sur quel article on veut agir
				$this->Post->id = $id;
				// On rend l'article invisible
				$this->Post->saveField('visible', 0);
				$this->Session->setFlash('Article supprimé !', 'success');
				return $this->redirect($this->referer());
			}
			// Si l'article n'existe pas
			else{
				throw new NotFoundException();
			}
		}
		// Si c'est un utilisateur
		else{
			throw new NotFoundException();
		}
	}

	public function like(){
		$id = $this->request->data['id'];
		// Si l'utlisateur n'a pas déjà aimé cet article
		if($this->Like->find('count', array('conditions' => array('Like.id_article' => $id, 'Like.ip' => $_SERVER['REMOTE_ADDR']))) == 0){
			// On ajoute son like
			$this->Like->Create;
			$this->Like->saveField('id_article', $id);
			$this->Like->saveField('ip', $_SERVER['REMOTE_ADDR']);
			if($this->Auth->user()){
				$this->Like->saveField('username', $this->Auth->user('username'));
			}
			else{
				$this->Like->saveField('username', 'Undefined');
			}
		}
		// Si l'utlisateur a déjà aimé cet article
		elseif($this->Like->find('count', array('conditions' => array('Like.id_article' => $id, 'Like.ip' => $_SERVER['REMOTE_ADDR']))) == 1){
			// On supprime son like
			$this->Like->deleteAll(array('Like.id_article' => $id, 'Like.ip' => $_SERVER['REMOTE_ADDR']), false);
		}
	}

	public function liked(){
		// Si l'utilisateur est connecté
		if($this->Auth->user()){
			$id = $this->Auth->user('id');
			// $likes = un liste des articles que l'utlisateur a aimé
			$likes = $this->Like->find('list', array('fields' => 'id_article', 'conditions' => array('Like.username' => $this->Auth->user('username'))));
			// On va cherché les articles que l'utlisateur a aimé, grâce à $likes
			$this->set('posts', $this->Post->find('all', array('conditions' => array('Post.id' => $likes, 'Post.visible' => 1, 'Post.draft' => 0), 'order' => array('Post.posted DESC'))));
			// On compte combien d'article l'utilisateur a aimé
			$this->set('nbPosts', $this->Like->find('count', array('conditions' => array('Like.username' => $this->Auth->user('username')))));
		}
		// Si l'utlisateur n'est pas connecté
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'info');
			return $this->redirect(['controller' => 'posts', 'action' => 'index']);
		}
	}

	public function admin_publish(){
		if($this->Auth->user('role') > 0){
			// On va agir sur l'id passé via l'url
			$this->Post->id = $this->request->params['named']['id'];
			$draft = $this->request->params['named']['draft'];
			// Si cet article n'est pas un brouillon
			if($draft == 0){
				// On passe l'article en brouillon
				$this->Post->saveField('draft', 1);
				$this->Session->setFlash('Article deplacé vers les brouillons !', 'success');
				$this->redirect(array('controller' => 'posts', 'action' => 'drafts'));
			}
			// Si cet article est un brouillon
			else{
				// On publie l'article
				$this->Post->saveField('draft', 0);
				// On recupère les données de cet article
				$data = $this->Post->find('first', array('conditions' => array('Post.id' => $this->request->params['named']['id'])));
				// Si cet article n'a jamais été publié
				if($data['Post']['posted'] == '0000-00-00 00:00:00'){
					// On update la date de publication
					$this->Post->saveField('posted', date("Y-m-d H:i:s"));
				}
				$this->Session->setFlash('Article publié !', 'success');
				return $this->redirect(['controller' => 'pages', 'action' => 'stats', 'admin' => true]);
			}
		}
		else{
			throw new NotFoundException();
		}
	}
}
?>