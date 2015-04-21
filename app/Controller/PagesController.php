<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('AYAH', 'Lib/AYAH');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = ['Informations', 'shopHistory', 'starpassHistory', 'paypalHistory', 'Team', 'Support', 'supportComments', 'donationLadder'];

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */

	public function beforeFilter(){
	    parent::beforeFilter();
        $this->Auth->allow();
	}

	public function display() {
		$path = func_get_args();
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;
		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function admin_install_update(){
		/***********************************/
		/**     Module de mise à jour     **/
		/** automatique en developpement  **/
		/***********************************/

		// if($this->Auth->user('role') > 0){
		// 	// Mise à jour MYSQL (non fonctionelle)
		// 	$mysql = file_get_contents('http://extaz-mc.fr/extazcms/maj.sql');
		// 	$db = ConnectionManager::getDataSource('default');

		// 	//Requête : sélectionne l'ensemble des colonnes de la table extraz_informations
		// 	$r = $db->rawQuery('SELECT * FROM extaz_informations LIMIT 0');

		// 	//Récupère l'ensemble des noms de colonnes dans un array/tableau :
		// 	//  "columnCount"   -> Permet de retourner le nombre de colonnes
		// 	//  "getColumnMeta" -> Permet de retourner les métadonnées d'une colonne
		// 	for($i = 0; $i < $r->columnCount(); $i++){
		// 	    $col = $r->getColumnMeta($i);
		// 	    $columns[] = $col['name'];
		// 	}
			
		// 	// Test si la colonne "use_slider" existe dans notre tableau comportant l'ensemble des colonnes de la table "informations"
		// 	if(in_array('use_slider', $columns)){
		// 		$test = 'La colonne use_slider existe deja dans la table informations';
		// 	}
		// 	else{
		// 		$test = 'Aucun resultat';
		// 	}
		// 	debug($test);
		// 	exit();
			
		// 	// Mise à jour des fichiers (fonctionelle)
		// 	$file = 'http://extaz-mc.fr/extazcms/maj.zip';
		// 	$newfile = 'tmp_file.zip';
		// 	if(!copy($file, $newfile)){
		// 	    $this->Session->setFlash('Un problème est survenu !', 'error');
		// 		$this->redirect(['controller' => 'pages', 'action' => 'update', 'admin' => true]);
		// 	}
		// 	$path = pathinfo(realpath($newfile), PATHINFO_DIRNAME);
		// 	$zip = new ZipArchive;
		// 	$res = $zip->open($newfile);
		// 	if($res === TRUE){
		// 		$zip->extractTo('../');
		// 		$zip->close();
		// 		unlink($newfile);
		// 		$this->Session->setFlash('Mise à jour effectué avec succès !', 'success');
		// 		$this->redirect(['controller' => 'pages', 'action' => 'update', 'admin' => true]);
		// 	}
		// 	else{
		// 		$this->Session->setFlash('Un problème est survenu !', 'error');
		// 		$this->redirect(['controller' => 'pages', 'action' => 'update', 'admin' => true]);
		// 	}
		// }
		// else{
		// 	throw new NotFoundException();
		// }
		$this->Session->setFlash('Module non disponible actuellement, veuillez procéder à une mise à jour manuelle', 'warning');
		$this->redirect(['controller' => 'pages', 'action' => 'update', 'admin' => true]);
	}

	public function admin_update(){
		if($this->Auth->user('role') > 0){
			
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_chat_update(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('ajax')){
				$informations = $this->Informations->find('first');
    			$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
				$data = '<i class="fa fa-clock-o"></i> Dernière mise à jour à '.date('H:i:s').', il y a '.$api->call('players.online.count')[0]['success'].' joueur(s) connecté(s)';
				echo json_encode($data);
				exit();
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_chat_messages(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('ajax')){
				$data = '';
				$informations = $this->Informations->find('first');
    			$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
				$messages = $api->call('streams.chat.latest', [$informations['Informations']['chat_nb_messages']])[0]['success'];
				if(count($messages) >= $informations['Informations']['chat_nb_messages']){
					foreach($messages as $m){
						if(empty($m['player'])){
							$explode = explode(']', $m['message']);
							$explode = str_replace('[', '', $explode);
							$player = $explode[0];
							$message = $explode[1];
						}
						else{
							$player = $m['player'];
							$message = $m['message'];
						}
						$data .='<small>['.date('H:i:s', $m['time']).']</small> <b class="player" id="'.$player.'"> '.$player.'</b> '.$message.'<br>';
					}
				}
				else{
					$data = '<div class="alert alert-warning alert-dismissable"><small>Désolé mais il n\'y a pas assez de messages pour afficher le chat (minimum '.$informations['Informations']['chat_nb_messages'].')</small></div>';
				}
				echo json_encode($data);
				exit();
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_send_message(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('ajax')){
				$informations = $this->Informations->find('first');
	    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
				$message = str_replace('/', '', $this->request->data['message']);
				//if(!empty($message) && $api->call('chat.with_name', [$message, $this->Auth->user('username')])){
				// if(!empty($message) && $api->call('chat.broadcast', ['['.$this->Auth->user('username').'] '.$message])){
				// 	exit();
				// }

				if(empty($informations['Informations']['chat_prefix'])){
					$prefix = '';
					$command = '['.$this->Auth->user('username').'] '.$message;
				}
				else{
					$prefix = '('.$informations['Informations']['chat_prefix'].') ';
					$command = $prefix.'['.$this->Auth->user('username').'] '.$message;
				}
				if(!empty($message)){
					$api->call('chat.broadcast', [$command]);
					exit();
				}
				
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_send_command(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('ajax')){
				$informations = $this->Informations->find('first');
	    		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
				$command = str_replace('/', '', $this->request->data['command']);
				if(!empty($command) && $api->call('server.run_command', [$command])){
					exit();
				}
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_edit_donator($id = null){
        if($this->Auth->user('role') > 0){
            $this->donationLadder->id = $id;
            if($this->donationLadder->exists()){
                $this->set('data', $this->donationLadder->find('first', ['conditions' => ['donationLadder.id' => $id]]));
                if($this->request->is('post')){
                    $this->donationLadder->id = $id;
                    $this->donationLadder->saveField('tokens', $this->request->data['Pages']['tokens_ladder']);
                    $this->donationLadder->saveField('updated', $this->request->data['Pages']['updated']);
                    $this->Session->setFlash('Modification réussie !', 'success');
                    return $this->redirect($this->referer());
                }
            }
            else{
                $this->Session->setFlash('Cet membre n\'existe pas !', 'error');
                return $this->redirect($this->referer());
            }
        }
    }

	public function admin_delete_donator($id = null){
		if($this->Auth->user('role') > 0){
			$this->donationLadder->id = $id;
			if($this->donationLadder->exists()){
				$this->donationLadder->delete($id);
				$this->Session->setFlash('Ce donateur a été retiré du classement !', 'success');
				return $this->redirect(['controller' => 'pages', 'action' => 'list_donator', 'admin' => true]);
			}
			else{
				$this->Session->setFlash('Ce dontateur n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'pages', 'action' => 'list_donator', 'admin' => true]);
			}
		}
		else{
			throw new NotFoundException();			
		}
	}

	public function admin_list_donator(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->donationLadder->find('all', ['order' => ['donationLadder.tokens' => 'DESC']]));
		}
		else{
			throw new NotFoundException();			
		}
	}

	public function admin_stats(){
		if($this->Auth->user('role') > 0){
			$today = date('Y-m-j').' 00:00:00';
			$hier = date('Y-m-j', strtotime('-1 day')).' 00:00:00';
			$thisWeek = date('Y-m-j', strtotime('-7 day')).' 00:00:00';
			// ACHATS
			// Depuis toujours
			$this->set('achatsDepuisToujours', $this->shopHistory->find('count'));
			$this->set('starpassDepuisToujours', $this->starpassHistory->find('count'));
			$this->set('paypalDepuisToujours', $this->paypalHistory->find('count'));
			// Les 7 derniers jours
			$this->set('achatsCetteSemaine', $this->shopHistory->find('count', ['conditions' => ['shopHistory.created >' => $thisWeek]]));
			$this->set('starpassCetteSemaine', $this->starpassHistory->find('count', ['conditions' => ['starpassHistory.created >' => $thisWeek]]));
			$this->set('paypalCetteSemaine', $this->paypalHistory->find('count', ['conditions' => ['paypalHistory.created >' => $thisWeek]]));
			// Ajd
			$this->set('achatsAujourdhui', $this->shopHistory->find('count', ['conditions' => ['shopHistory.created >' => $today]]));
			$this->set('starpassAujourdhui', $this->starpassHistory->find('count', ['conditions' => ['starpassHistory.created >' => $today]]));
			$this->set('paypalAujourdhui', $this->paypalHistory->find('count', ['conditions' => ['paypalHistory.created >' => $today]]));
			// Hier
			$this->set('achatsHier', $this->shopHistory->find('count', ['conditions' => ['shopHistory.created >' => $hier, 'shopHistory.created <' => $today]]));
			$this->set('starpassHier', $this->starpassHistory->find('count', ['conditions' => ['starpassHistory.created >' => $hier, 'starpassHistory.created <' => $today]]));
			$this->set('paypalHier', $this->paypalHistory->find('count', ['conditions' => ['paypalHistory.created >' => $hier, 'paypalHistory.created <' => $today]]));

			// GLOBALES
			// Depuis toujours
			$this->set('utilisateursDepuisToujours', $this->User->find('count'));
			$this->set('ticketsDepuisToujours', $this->Support->find('count'));
			$this->set('reponsesDepuisToujours', $this->supportComments->find('count'));
			// Les 7 derniers jours
			$this->set('utilisateursCetteSemaine', $this->User->find('count', ['conditions' => ['User.created >' => $thisWeek]]));
			$this->set('ticketsCetteSemaine', $this->Support->find('count', ['conditions' => ['Support.created >' => $thisWeek]]));
			$this->set('reponsesCetteSemaine', $this->supportComments->find('count', ['conditions' => ['supportComments.created >' => $thisWeek]]));
			// Ajd
			$this->set('utilisateursAujourdhui', $this->User->find('count', ['conditions' => ['User.created >' => $today]]));
			$this->set('ticketsAujourdhui', $this->Support->find('count', ['conditions' => ['Support.created >' => $today]]));
			$this->set('reponsesAujourdhui', $this->supportComments->find('count', ['conditions' => ['supportComments.created >' => $today]]));
			// Hier
			$this->set('utilisateursHier', $this->User->find('count', ['conditions' => ['User.created >' => $hier, 'User.created <' => $today]]));
			$this->set('ticketsHier', $this->Support->find('count', ['conditions' => ['Support.created >' => $hier, 'Support.created <' => $today]]));
			$this->set('reponsesHier', $this->supportComments->find('count', ['conditions' => ['supportComments.created >' => $hier, 'supportComments.created <' => $today]]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function add_ticket(){
		if($this->Auth->user()){
			if($this->request->is('post')){
				if(!empty($this->request->data['Pages']['message'])){
					$this->Support->create;
					$this->Support->saveField('user_id', $this->Auth->user('id'));
					$this->Support->saveField('username', $this->Auth->user('username'));
					$this->Support->saveField('priority', $this->request->data['Pages']['priority']);
					$this->Support->saveField('message', $this->request->data['Pages']['message']);
					$this->Support->saveField('resolved', 0);
					$this->Session->setFlash('Votre message a été envoyé au support, merci !', 'success');
					return $this->redirect(['controller' => 'pages', 'action' => 'list_tickets']);
				}
				else{
					$this->Session->setFlash('Vous devez écrire un message', 'error');
					return $this->redirect(['controller' => 'pages', 'action' => 'add_ticket']);
				}
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}

	public function list_tickets(){
		if($this->Auth->user()){
			$this->set('data', $this->Support->find('all', ['conditions' => ['Support.username' => $this->Auth->user('username')], 'order' => ['Support.created DESC']]));
			$this->set('nbTickets', $this->Support->find('count', ['conditions' => ['Support.username' => $this->Auth->user('username')]]));
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}

	public function view_ticket($id = null){
		if($this->Auth->user()){
			$ticket = $this->Support->find('first', ['conditions' => ['Support.id' => $id]]);
			$ticketOwner = $ticket['Support']['username'];
			if($ticketOwner == $this->Auth->user('username') OR $this->Auth->user('role') > 0){
				if($this->Support->findById($id)){
					$this->set('data', $this->Support->find('first', ['conditions' => ['Support.id' => $id]]));
					$this->set('comments', $this->supportComments->find('all', ['conditions' => ['supportComments.ticket_id' => $id], 'order' => ['supportComments.created DESC']]));
					$this->set('nbComments', $this->supportComments->find('count', ['conditions' => ['supportComments.ticket_id' => $id], 'order' => ['supportComments.created DESC']]));
				}
				else{
					throw new NotFoundException();
				}
			}
			else{
				throw new NotFoundException();
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'pages', 'action' => 'list_tickets']);
		}
	}

	public function close_ticket($id = null){
		if($this->Auth->user('role') > 0){
			if($this->Support->find('first', ['conditions' => ['Support.id' => $id]])){
				$this->Support->id = $id;
				$this->Support->saveField('resolved', 1);
				$this->Session->setFlash('Ticket clôturé', 'success');
				return $this->redirect($this->referer());
			}
			else{
				throw new NotFoundException();
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'pages', 'action' => 'list_tickets']);
		}
	}

	public function close_my_ticket($id = null){
		if($this->Auth->user()){
			if($this->Support->find('first', ['conditions' => ['Support.id' => $id]])){
				$this->Support->id = $id;
				$this->Support->saveField('resolved', 1);
				$this->Session->setFlash('Votre ticket a bien été fermé', 'success');
				return $this->redirect($this->referer());
			}
			else{
				throw new NotFoundException();
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'pages', 'action' => 'list_tickets']);
		}
	}

	public function open_ticket($id = null){
		if($this->Auth->user('role') > 0){
			if($this->Support->find('first', ['conditions' => ['Support.id' => $id]])){
				$this->Support->id = $id;
				$this->Support->saveField('resolved', 0);
				$this->Session->setFlash('Ticket ouvert', 'success');
				return $this->redirect($this->referer());
			}
			else{
				throw new NotFoundException();
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'pages', 'action' => 'list_tickets']);
		}
	}

	public function answer_ticket($id = null){
		if($this->Auth->user()){
			if($this->request->is('post')){
				if(!empty($this->request->data['Pages']['message'])){
					$ticket = $this->Support->find('first', ['conditions' => ['Support.id' => $this->request->data['Pages']['id']]]);
					$ticketOwner = $this->User->find('first', ['conditions' => ['User.username' => $ticket['Support']['username']]]);
					$ticketOwnerEmail = $ticketOwner['User']['email'];
					$ticketOwnerAllowEmail = $ticketOwner['User']['allow_email'];
					if($ticketOwner['User']['username'] == $this->Auth->user('username') OR $this->Auth->user('role') > 0){
						if($ticket['Support']['resolved'] == 0){
							// Si l'utilisateur accepte de recevoir des emails
							if($ticketOwnerAllowEmail == 1){
								$informations = $this->Informations->find('first');
								$name_server = $informations['Informations']['name_server'];
								$name_server = strtolower(preg_replace('/\s/', '', $name_server));
								$Email = new CakeEmail();
								$Email->from(array('support@'.$name_server.'.com' => $name_server));
								$Email->to($ticketOwnerEmail);
								$Email->subject('['.$informations['Informations']['name_server'].'] Support, nouvelle réponse à votre ticket #'.$ticket['Support']['id'].'');
								$Email->send('Retrouvez cette nouvelle réponse ici : http://'.$_SERVER['HTTP_HOST'].$this->webroot.'tickets/'.$ticket['Support']['id']);
							}
							$this->supportComments->create;
							$this->supportComments->saveField('ticket_id', $this->request->data['Pages']['id']);
							$this->supportComments->saveField('username', $this->Auth->user('username'));
							$this->supportComments->saveField('message', $this->request->data['Pages']['message']);
							$this->Session->setFlash('Réponse ajoutée !', 'success');
							return $this->redirect($this->referer());
						}
						else{
							$this->Session->setFlash('Ce ticket est fermé...', 'error');
							return $this->redirect($this->referer());
						}
					}
					else{
						$this->Session->setFlash('Action impossible !', 'error');
						return $this->redirect($this->referer());
					}
				}
				else{
					$this->Session->setFlash('Vous devez écrire un message', 'error');
					return $this->redirect($this->referer());
				}
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'pages', 'action' => 'add_ticket']);
		}
	}

	public function admin_manage_tickets(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Support->find('all', ['conditions' => ['Support.resolved' => 0], 'order' => ['Support.created DESC']]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function delete_support_comment($id = null){
		if($this->Auth->user('role') > 0){
			$this->supportComments->delete($id);
			$this->Session->setFlash('Réponse supprimée', 'success');
			return $this->redirect($this->referer());
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_shop_history(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->shopHistory->find('all', ['order' => ['shopHistory.created DESC']]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_starpass_history(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->starpassHistory->find('all', ['order' => ['starpassHistory.created DESC']]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_paypal_history(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->paypalHistory->find('all', ['order' => ['paypalHistory.created DESC']]));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_add_member(){
		if($this->Auth->user('role') > 0){
			if($this->request->is('post')){
				$username = trim($this->request->data['Pages']['username']);
				$this->Team->saveField('username', $username);
				$this->Team->saveField('rank', $this->request->data['Pages']['rank']);
				if(!empty($this->request->data['Pages']['color'])){
					$this->Team->saveField('color', $this->request->data['Pages']['color']);
				}
				else{
					$this->Team->saveField('color', 'light');
				}
				$this->Team->saveField('order', $this->request->data['Pages']['order']);
				$this->Team->saveField('facebook_url', $this->request->data['Pages']['facebook_url']);
				$this->Team->saveField('twitter_url', $this->request->data['Pages']['twitter_url']);
				$this->Session->setFlash('Membre ajouté à l\'équipe !', 'success');
				return $this->redirect(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_list_member(){
		if($this->Auth->user('role') > 0){
			$this->set('data', $this->Team->find('all', array('order' => array('Team.order' => 'ASC'))));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_delete_member($id = null){
		if($this->Auth->user('role') > 0){
			if($this->Team->findById($id)){
				$this->Team->delete($id);
				$this->Session->setFlash('Membre retiré de l\'équipe !', 'success');
				return $this->redirect(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]);
			}
			else{
				$this->Session->setFlash('Ce membre n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_edit_member($id = null){
        if($this->Auth->user('role') > 0){
            $this->Team->id = $id;
            if($this->Team->exists()){
                $this->set('data', $this->Team->find('first', ['conditions' => ['Team.id' => $id]]));
                if($this->request->is('post')){
                    $this->Team->id = $id;
                    $this->Team->saveField('username', $this->request->data['Pages']['username']);
					$this->Team->saveField('rank', $this->request->data['Pages']['rank']);
					if(!empty($this->request->data['Pages']['color'])){
						$this->Team->saveField('color', $this->request->data['Pages']['color']);
					}
					$this->Team->saveField('order', $this->request->data['Pages']['order']);
					$this->Team->saveField('facebook_url', $this->request->data['Pages']['facebook_url']);
					$this->Team->saveField('twitter_url', $this->request->data['Pages']['twitter_url']);
                    $this->Session->setFlash('Membre modifié !', 'success');
                    return $this->redirect(['controller' => 'pages', 'action' => 'list_member', 'admin' => true]);
                }
            }
            else{
                $this->Session->setFlash('Cet membre n\'existe pas !', 'error');
                return $this->redirect($this->referer());
            }
        }
    }

	public function team(){
		$this->set('data', $this->Team->find('all', ['order' => ['Team.order ASC']]));
		$this->set('count', $this->Team->find('count'));
	}

	public function contact(){
		if($this->Auth->user()){
			$ayah = new AYAH();
            $this->set('ayah', $ayah);
			if($this->request->is('post')){
                if(array_key_exists('captcha', $this->request->data)){
                    $score = $ayah->scoreResult();
                    if($score){
						$informations = $this->Informations->find('first');
						$contact_email = $informations['Informations']['contact_email'];
						$name_server = $informations['Informations']['name_server'];
						$username = $this->Auth->user('username');
						$email = $this->Auth->user('email');
						$subject = $this->request->data['Pages']['subject'];
						$message = $this->request->data['Pages']['message'];
						if(!empty($subject) && !empty($message)){
							$name_server = strtolower(preg_replace('/\s/', '', $name_server));
							$Email = new CakeEmail();
		                    $Email->from(array('admin@'.$name_server.'.com' => $name_server));
		                    $Email->to($contact_email);
		                    $Email->subject($subject);
		                    $Email->send($username.' ('.$email.') a envoyé : '.$message);
							$this->Session->setFlash('Votre message a été envoyé, merci !', 'success');
						}
						else{
							$this->Session->setFlash('Tous les champs sont obligatoires', 'error');
						}
					}
					else{
						$this->Session->setFlash('Erreur 1001', 'error');
					}
				}
			}
		}
		else{
			$this->Session->setFlash('Vous devez être connecté pour accéder à cette page', 'error');
			return $this->redirect(['controller' => 'users', 'action' => 'login', 'admin' => false]);
		}
	}

	public function rules(){
		
	}
}
