<?php
Class ShopsController extends AppController{

	public $uses = ['Shop', 'User', 'Informations', 'starpassHistory', 'shopHistory', 'donationLadder'];

	var $paginate = array(
		'Shop' => array(
			'limit' => 9,
			'order' => array(
				'Shop.id' => 'ASC'
			),
			'paramType'=> 'named'
		));

	public function index(){
		$informations = $this->Informations->find('first');
		$use_store = $informations['Informations']['use_store'];
		// Si la boutique est activée
		if($use_store == 1){
			// Pagination
			$q = $this->paginate('Shop');
			$this->set('items', $q);
			$this->set('nbItems', $this->Shop->find('count'));
		}
		// Si la boutique est désactivée
		else{
			throw new NotFoundException();
		}
	}

	public function admin_add(){
		if($this->Auth->user('role') > 0){
			$this->set('list_item', $this->Shop->find('all', ['fields' => ['name', 'id']]));
			if($this->request->is('post')){
				$this->Shop->set($this->request->data);
				if($this->Shop->validates()){
					$this->Shop->create;
					$explode = explode('--', $this->request->data['Shop']['required']);
					$required = $explode[0];
					$required_name = $explode[1];
					$this->Shop->save($this->request->data);
					if(empty($this->request->data['Shop']['required'])){
						$this->request->data['Shop']['required'] = -1;
					}
					else{
						$this->Shop->saveField('required', $required);
					}
					$this->Shop->saveField('required_name', $required_name);
					$this->Session->setFlash('Article ajouté à la boutique !', 'success');
					return $this->redirect(['controller' => 'shops', 'action' => 'list', 'admin' => true]);
				}
				else{
					$this->Session->setFlash('Une erreur est survenue !', 'error');
				}
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_list(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Shop->find('all', array('order' => array('Shop.created' => 'DESC'))));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_edit($id){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Shop->find('first', ['conditions' => ['Shop.id' => $id]]));
			$this->set('list_item', $this->Shop->find('all', ['conditions' => ['Shop.id !=' => $id], 'fields' => ['name', 'id']]));
			if($this->request->is('post')){
				$this->Shop->set($this->request->data);
				if($this->Shop->validates()){
					$this->Shop->id = $id;
					$explode = explode('--', $this->request->data['Shop']['required']);
					$required = $explode[0];
					$required_name = $explode[1];
					$this->Shop->save($this->request->data);
					if(empty($this->request->data['Shop']['required'])){
						$this->request->data['Shop']['required'] = -1;
					}
					else{
						$this->Shop->saveField('required', $required);
					}
					$this->Shop->saveField('required_name', $required_name);
					$this->Session->setFlash('Article modifié !', 'success');
					return $this->redirect($this->referer());
				}
				else{
					$this->Session->setFlash('Une erreur est survenue !', 'error');
				}
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function delete($id){
		if($this->Auth->user('role') > 0){
			$this->Shop->delete($id);
			$this->Session->setFlash('Article supprimé !', 'success');
			return $this->redirect($this->referer());
		}
		else{
			throw new NotFoundException();
		}
	}

	public function reload(){
		if($this->Auth->user()){
			
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}

	public function search(){
		$min = 3; // Nombre de carac minimum
		$max = 40; // Nombre de carac maximum
		// Si une recherche a été effectuée
		if(isset($this->request->data['Shop']['search'])){
			$this->set('request', $this->request->data['Shop']['search']);
			// Si la recherche n'est pas trop courte ou n'est pas trop longue
			if(strlen($this->request->data['Shop']['search']) >= $min && strlen($this->request->data['Shop']['search']) <= $max){
				// On va chercher les articles qui correspondent à la recherche
				$this->set('items', $this->Shop->find('all', ['conditions' => ['Shop.name LIKE' => '%'.$this->request->data['Shop']['search'].'%'], 'order' => ['Shop.created DESC']]));
				// Et on compte combien d'articles correspondent à la recherche
				$this->set('nbItems', $this->Shop->find('count', ['conditions' => ['Shop.name LIKE' => '%'.$this->request->data['Shop']['search'].'%'], 'order' => ['Shop.created DESC']]));
			}
			// Si la recherche est trop courte ou trop longu
			else{
				$this->set('nbItems', 0);
				$this->Session->setFlash('Faites une recherche qui contient entre '.$min.' et '.$max.' caractères', 'warning');
			}
		}
		// Si aucune recherche n'a été effectué
		else{
			throw new NotFoundException();
		}
	}

	public function starpass(){
		if($this->Auth->user()){
			if($this->request->is('post')){
				$informations = $this->Informations->find('first');
				// Déclaration des variables
				$ident = $idp = $ids = $idd = $code = $code1 = $datas = ''; 
				$idp = $informations['Informations']['starpass_idp'];
				$idd = $informations['Informations']['starpass_idd'];
				$ident = $idp.";".$ids.";".$idd;
				// On récupère le code
				if(isset($this->request->data['code1'])){
					$code = $this->request->data['code1'];
				}
				// On récupère le champ DATAS
				$datas = '';
				// On encode les trois chaines en URL
				$ident = urlencode($ident);
				$code = urlencode($code);
				$datas = urlencode($datas);

				// Envoi de la requête vers le serveur StarPass
				// Dans la variable tab[0] on récupère la réponse du serveur
				// Dans la variable tab[1] on récupère l'URL d'accès ou d'erreur suivant la réponse du serveur
				$get_f = file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$code&DATAS=$datas"); 
				if(!$get_f){ 
					exit('Votre serveur n\'a pas accès au serveur de StarPass, merci de contacter votre hébergeur.'); 
				} 
				$tab = explode('|',$get_f[0]);

				if(!$tab[1]){
					$url = 'http://script.starpass.fr/error.php';
				}
				else{
					$url = $tab[1];
				}
				// Si $tab[0] ne répond pas "OUI" l'accès est refusé
				if(substr($tab[0],0,3) != 'OUI'){ 
			       $this->Session->setFlash('Code eronné', 'error');
				} 
				else{
					// On recup les infos de l'utlisateur
					$user = $this->User->find('first', ['conditions' => ['User.username' => $this->Auth->user('username')]]);
					$userTokens = $user['User']['tokens'];
					// On définit son nv nb de tokens
					$happy_hour_bonus = $informations['Informations']['happy_hour_bonus'];
					$starpass_tokens = $informations['Informations']['starpass_tokens'];
					$starpass_tokens_hh = $happy_hour_bonus/100 * $starpass_tokens + $starpass_tokens;
					if($informations['Informations']['happy_hour'] == 1){
						$newUserMoneySite = $userTokens + $starpass_tokens_hh;
					}
					else{
						$newUserMoneySite = $userTokens + $starpass_tokens;
					}
					$this->User->id = $this->Auth->user('id');
					$this->User->saveField('tokens', $newUserMoneySite);
					// Historique
					$this->starpassHistory->create;
					$this->starpassHistory->saveField('username', $this->Auth->user('username'));
					$this->starpassHistory->saveField('code', $this->request->data['code1']);
					if($informations['Informations']['happy_hour'] == 1){
						$this->starpassHistory->saveField('tokens', $starpass_tokens_hh);
						$this->starpassHistory->saveField('note', 'Happy hour');
					}
					else{
						$this->starpassHistory->saveField('tokens', $starpass_tokens);
						$this->starpassHistory->saveField('note', 'Classique');
					}
					// Donation ladder
					if($this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $this->Auth->user('id')]])){
						if($informations['Informations']['happy_hour'] == 1){
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $this->Auth->user('id')]]);
							$newTokens = $donationLadder['donationLadder']['tokens'] + $starpass_tokens_hh;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $newTokens);
						}
						else{
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $this->Auth->user('id')]]);
							$newTokens = $donationLadder['donationLadder']['tokens'] + $starpass_tokens;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $newTokens);
						}
					}
					else{
						if($informations['Informations']['happy_hour'] == 1){
							$this->donationLadder->create;
							$this->donationLadder->saveField('user_id', $this->Auth->user('id'));
							$this->donationLadder->saveField('tokens', $starpass_tokens_hh);
						}
						else{
							$this->donationLadder->create;
							$this->donationLadder->saveField('user_id', $this->Auth->user('id'));
							$this->donationLadder->saveField('tokens', $starpass_tokens);
						}
					}
					// Message
					$this->Session->setFlash('Merci de votre confiance, vous avez maintenant '.$newUserMoneySite.' '.$informations['Informations']['site_money'].' !', 'success');
				}
			}
			else{
				$this->Session->setFlash('Ridicule...', 'error');
			}
			return $this->redirect(['controller' => 'shops', 'action' => 'reload']);
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'shops', 'action' => 'reload']);
		}
	}

	public function buy($id, $money){
		// JSONAPI
		$informations = $this->Informations->find('first');
		$use_store = $informations['Informations']['use_store'];
		$use_server_money = $informations['Informations']['use_server_money'];
    	$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
    	// On test si le joueur est en ligne
    	$playersOnline = $api->call('players.online.names'); // Tableau des joueurs en lignes
		$testPlayerOnline = in_array($this->Auth->user('username'), $playersOnline[0]['success']); // On cherche dans ce tableau
		// Si on a trouvé le pseudo du joueur dans le tableau des joueurs en ligne
		if($testPlayerOnline){
			$testPlayerOnline = 'online';
		}
		// Sinon... il n'est pas connecté IG
		else{
			$testPlayerOnline = 'offline';
		}
		// Si l'utlisateur est co au site
		if($this->Auth->user()){
			// Si l'item existe
			if($this->Shop->find('first', ['conditions' => ['Shop.id' => $id]])){
				// Si la boutique est activée
				if($use_store == 1){
					// Si l'utlisateur est co en jeu
					if($testPlayerOnline == 'online'){
						// Si l'utilisateur paye avec la monnaie du site
						if($money == 'site'){
							$user = $this->User->find('first', ['conditions' => ['User.username' => $this->Auth->user('username')]]); // On recup les infos de l'utlisateur
							$userMoneySite = $user['User']['tokens']; // Le nombre de tokens de l'utilisateur
							$item = $this->Shop->find('first', ['conditions' => ['Shop.id' => $id]]); // On recup les infos de l'item
							$price = $item['Shop']['price_money_site']; // Cout de l'achat avec la monnaie du site
							// Si l'utilisateur a assez
							if($userMoneySite >= $price){
								// S'il y a un prérequis pour cet achat
								if($item['Shop']['required'] != -1){
									$itemRequired = $item['Shop']['required'];
									$itemName = $this->Shop->find('first', ['conditions' => ['Shop.id' => $itemRequired]]);
									// Si l'utilisateur n'a pas le prérequis
									if(!$this->shopHistory->find('first', ['conditions' => ['username' => $this->Auth->user('username'), 'item_id' => $itemRequired]])){
										$this->Session->setFlash('Cet achat a un prérequis vous devez d\'abord acheter <u>'.$itemName['Shop']['name'].'</u>', 'error');
										return $this->redirect(['controller' => 'shops', 'action' => 'index']);
									}
								}
								// Historique d'achat
								$this->shopHistory->create;
								$this->shopHistory->saveField('username', $this->Auth->user('username'));
								$this->shopHistory->saveField('item', $item['Shop']['name']);
								$this->shopHistory->saveField('item_id', $item['Shop']['id']);
								$this->shopHistory->saveField('price', $price);
								$this->shopHistory->saveField('money', $money);
								// On définit son nv nb de tokens
								$newUserMoneySite = $userMoneySite - $price;
								$this->User->id = $this->Auth->user('id');
								$this->User->saveField('tokens', $newUserMoneySite);
								// On execute la commande
								$command = str_replace('{{player}}', $this->Auth->user('username'), $item['Shop']['command']);
								if(strstr($item['Shop']['command'], '{{new}}')){
									$new_command = explode('{{new}}', $command);
									foreach($new_command as $command) {
										$api->call('server.run_command', [$command]);
									}
								}
								else{
									$api->call('server.run_command', [$command]);
								}
								// On redirige avec un message
								$this->Session->setFlash('Achat effectué, vous avez depensé '.$price.' '.$informations['Informations']['site_money'].'', 'success');
								return $this->redirect(['controller' => 'shops', 'action' => 'index']);
							}
							// Si l'utilisateur n'a pas assez
							else{
								$this->Session->setFlash('Vous n\'avez pas assez de '.$informations['Informations']['site_money'].'', 'error');
								return $this->redirect(['controller' => 'shops', 'action' => 'index']);
							}
						}
						// L'utilisateur paye avec la monnaie du serveur
						else{
							// Si l'utilisation de la monnaie du serveur est activée
							if($use_server_money == 1){
								$user = $this->User->find('first', ['conditions' => ['User.username' => $this->Auth->user('username')]]); // On recup les infos de l'utlisateur
								$userMoneyServer = $api->call('players.name.bank.balance', [$this->Auth->user('username')])[0]['success']; // Le nombre d'argent, sur le serveur
								$item = $this->Shop->find('first', ['conditions' => ['Shop.id' => $id]]); // On recup les infos de l'item
								$price = $item['Shop']['price_money_server']; // Cout de l'achat avec la monnaie du serveur
								if($price == -1){
									return $this->redirect(['controller' => 'shops', 'action' => 'index']);
									exit();
								}
								// Si l'utilisateur a assez
								if($userMoneyServer >= $price){
									// S'il y a un prérequis pour cet achat
									if($item['Shop']['required'] != -1){
										$itemRequired = $item['Shop']['required'];
										$itemName = $this->Shop->find('first', ['conditions' => ['Shop.id' => $itemRequired]]);
										// Si l'utilisateur n'a pas le prérequis
										if(!$this->shopHistory->find('first', ['conditions' => ['username' => $this->Auth->user('username'), 'item_id' => $itemRequired]])){
											$this->Session->setFlash('Cet achat a un prérequis vous devez d\'abord acheter <u>'.$itemName['Shop']['name'].'</u>', 'error');
											return $this->redirect(['controller' => 'shops', 'action' => 'index']);
										}
									}
									// Historique d'achat
									$this->shopHistory->create;
									$this->shopHistory->saveField('username', $this->Auth->user('username'));
									$this->shopHistory->saveField('item', $item['Shop']['name']);
									$this->shopHistory->saveField('item_id', $item['Shop']['id']);
									$this->shopHistory->saveField('price', $price);
									$this->shopHistory->saveField('money', $money);
									// On définit son nv nb de tokens
									$newUserMoneyServer = $userMoneyServer - $price;
									$api->call('players.name.bank.withdraw', [$this->Auth->user('username'), $price]);
									// On execute la commande
									$command = str_replace('{{player}}', $this->Auth->user('username'), $item['Shop']['command']);
									if(strstr($item['Shop']['command'], '{{new}}')){
										$new_command = explode('{{new}}', $command);
										foreach($new_command as $command) {
											$api->call('server.run_command', [$command]);
										}
									}
									else{
										$api->call('server.run_command', [$command]);
									}
									// On redirige avec un message
									$this->Session->setFlash('Achat effectué, vous avez depensé '.$price.' '.$informations['Informations']['money_server'].'', 'success');
									return $this->redirect(['controller' => 'shops', 'action' => 'index']);
								}
								// Si l'utilisateur n'a pas assez
								else{
									$this->Session->setFlash('Vous n\'avez pas assez de '.$informations['Informations']['money_server'].'', 'error');
									return $this->redirect(['controller' => 'shops', 'action' => 'index']);
								}
							}
							// Si l'utilisation de la monnaie du serveur est désactivée
							else{
								$this->Session->setFlash('Action impossible', 'error');
								return $this->redirect(['controller' => 'shops', 'action' => 'index']);
							}
						}
					// Si l'utlisateur n'est pas co en jeu
					}
					else{
						$this->Session->setFlash('Vous devez être connecté en jeu avant de faire des achats', 'error');
						return $this->redirect(['controller' => 'shops', 'action' => 'index']);
					}
				// Si la boutique n'est pas activé
				}
				else{
					$this->Session->setFlash('Désolé mais la boutique est désactivé, contactez un administrateur', 'error');
					return $this->redirect(['controller' => 'shops', 'action' => 'index']);
				}
			}
			// Si l'item n'existe pas
			else{
				$this->Session->setFlash('Cet article n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'shops', 'action' => 'index']);
			}
		// Si l'utlisateur n'est pas co au site
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}
}