<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('JSONAPI', 'Lib');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $viewClass = 'TwigView.Twig';

	public $ext = '.twig';

	public $uses = ['Informations', 'User', 'starpassHistory', 'Support', 'donationLadder', 'Button', 'Cpage'];

	public $helpers = ['Html', 'Form', 'PaypalIpn.Paypal'];

	public $components = [
		'Session',
		'Auth' => [
			'loginRedirect' => ['controller' => 'posts', 'action' => 'index'],
			'logoutRedirect' => ['controller' => 'posts', 'action' => 'index']
		]
	];

	public function beforeFilter(){
		if(version_compare(PHP_VERSION, '5.4.0') < 0){
    		exit('Vous devez avoir PHP 5.4 minimum pour utiliser ExtazCMS'); // Merci MTC ^_^
		}
		if((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))){
			$this->layout = 'admin';
		}
		// Variable qui regroupe toutes les infos depuis la bdd 
		$this->config = $this->Informations->find('first');
		$this->config = $this->config['Informations'];
		$this->set('informations', $this->Informations->find('first'));
		$this->set('infos', $this->config);
		// On déclare JSONAPI
		$informations = $this->Informations->find('first');
		$api = new JSONAPI($informations['Informations']['jsonapi_ip'], $informations['Informations']['jsonapi_port'], $informations['Informations']['jsonapi_username'], $informations['Informations']['jsonapi_password'], $informations['Informations']['jsonapi_salt']);
		// On transmet les données
		$this->set('api', $api);
		$this->set('jsonapi_ip', $informations['Informations']['jsonapi_ip']);
		$this->set('jsonapi_port', $informations['Informations']['jsonapi_port']);
		$this->set('jsonapi_username', $informations['Informations']['jsonapi_username']);
		$this->set('jsonapi_password', $informations['Informations']['jsonapi_password']);
		$this->set('jsonapi_salt', $informations['Informations']['jsonapi_salt']);
		$this->set('name_server', $informations['Informations']['name_server']);
		$this->set('server_ip', $informations['Informations']['ip_server']);
		$this->set('server_port', $informations['Informations']['port_server']);
		$this->set('money_server', $informations['Informations']['money_server']);
		$this->set('site_money', $informations['Informations']['site_money']);
		$this->set('starpass_idp', $informations['Informations']['starpass_idp']);
		$this->set('starpass_idd', $informations['Informations']['starpass_idd']);
		$this->set('starpass_tokens', $informations['Informations']['starpass_tokens']);
		$this->set('paypal_price', $informations['Informations']['paypal_price']);
		$this->set('paypal_tokens', $informations['Informations']['paypal_tokens']);
		$this->set('paypal_email', $informations['Informations']['paypal_email']);
		$this->set('logo_url', $informations['Informations']['logo_url']);
		$this->set('use_store', $informations['Informations']['use_store']);
		$this->set('use_paypal', $informations['Informations']['use_paypal']);
		$this->set('use_economy', $informations['Informations']['use_economy']);
		$this->set('use_server_money', $informations['Informations']['use_server_money']);
		$this->set('use_team', $informations['Informations']['use_team']);
		$this->set('use_contact', $informations['Informations']['use_contact']);
		$this->set('use_rules', $informations['Informations']['use_rules']);
		$this->set('use_donation_ladder', $informations['Informations']['use_donation_ladder']);
		$this->set('use_slider', $informations['Informations']['use_slider']);
		$this->set('use_captcha', $informations['Informations']['use_captcha']);
		$this->set('use_votes', $informations['Informations']['use_votes']);
		$this->set('use_votes_ladder', $informations['Informations']['use_votes_ladder']);
		$this->set('happy_hour', $informations['Informations']['happy_hour']);
		$this->set('happy_hour_bonus', $informations['Informations']['happy_hour_bonus']);
		$this->set('rules', $informations['Informations']['rules']);
		$this->set('background', $informations['Informations']['background']);
		$this->set('chat_prefix', $informations['Informations']['chat_prefix']);
		$this->set('chat_nb_messages', $informations['Informations']['chat_nb_messages']);
		$this->set('analytics', $informations['Informations']['analytics']);
		$this->set('maintenance', $informations['Informations']['maintenance']);
		$this->set('send_tokens_loss_rate', $informations['Informations']['send_tokens_loss_rate']);
		$this->set('votes_url', $informations['Informations']['votes_url']);
		$this->set('votes_description', $informations['Informations']['votes_description']);
		$this->set('votes_time', $informations['Informations']['votes_time']);
		$this->set('votes_reward', $informations['Informations']['votes_reward']);
		$this->set('votes_command', $informations['Informations']['votes_command']);
		$this->set('votes_ladder_limit', $informations['Informations']['votes_ladder_limit']);
		$this->set('customs_buttons_title', $informations['Informations']['customs_buttons_title']);
		// Le reste
		$this->set('connected', $this->Auth->user());
		$this->set('username', $this->Auth->user('username'));
		$this->set('email', $this->Auth->user('email'));
		if($this->Auth->user()){
			$user_informations = $this->User->find('first', ['conditions' => ['User.id' => $this->Auth->user('id')]]);
			$this->set('tokens', $user_informations['User']['tokens']);
			$this->tokens = $user_informations['User']['tokens'];
			$this->set('allow_email', $user_informations['User']['allow_email']);
			$this->set('role', $user_informations['User']['role']);
		}
		else{
			$this->set('role', 0);
		}
		$this->set('tickets', $this->Support->find('count', ['conditions' => ['Support.user_id' => $this->Auth->user('id'), 'Support.resolved' => 0]]));
		$this->set('nb_tickets_admin', $this->Support->find('count', ['conditions' => ['Support.resolved' => '0']]));
		if($this->config['use_economy'] == 1){
			$this->set('money_in_game', $api->call('players.name.bank.balance', [$this->Auth->user('username')])[0]['success']);
		}
		// Donnation Ladder
		if($this->donationLadder->find('all')){
			$this->set('best_donator', $this->donationLadder->find('first', ['order' => ['donationLadder.tokens DESC']]));
			$this->set('last_donator', $this->donationLadder->find('first', ['order' => ['donationLadder.updated DESC']]));
			$this->set('nb_donator', $this->donationLadder->find('count'));
		}
		else{
			$this->set('nb_donator', $this->donationLadder->find('count'));
		}
		// Boutique
		/*
		* Nombre de tokens gratuit avec un code Starpass
		* starpass_happy_hour_bonus = bonus de l'happy (en %) divisé par 100 fois le nombre de tokens obtenu pour un code Starpass
		*/
		$starpass_happy_hour_bonus = $this->config['happy_hour_bonus'] / 100 * $this->config['starpass_tokens'];
		$this->starpass_happy_hour_bonus = $starpass_happy_hour_bonus;
		$this->set('starpass_happy_hour_bonus', $starpass_happy_hour_bonus);
		/*
		* Nombre de tokens gratuit avec un paiement via PayPal
		* paypal_happy_hour_bonus = bonus de l'happy (en %) divisé par 100 fois le nombre de tokens obtenu pour un paiement via PayPal
		*/
		$paypal_happy_hour_bonus = $this->config['happy_hour_bonus'] / 100 * $this->config['paypal_tokens'];
		$this->paypal_happy_hour_bonus = $paypal_happy_hour_bonus;
		$this->set('paypal_happy_hour_bonus', $paypal_happy_hour_bonus);
		/*
		* Nombre total de tokens obtenu avec un code Starpass pendant une happy hour
		* starpass_tokens_during_happy_hour = Nombre de tokens gratuit grâce à l'happy hour + le nombre de tokens normal
		*/
		$starpass_tokens_during_happy_hour = $starpass_happy_hour_bonus + $this->config['starpass_tokens'];
		$this->starpass_tokens_during_happy_hour = $starpass_tokens_during_happy_hour;
		$this->set('starpass_tokens_during_happy_hour', $starpass_tokens_during_happy_hour);
		/*
		* Nombre total de tokens obtenu avec un paiement via PayPal pendant une happy hour
		* paypal_tokens_during_happy_hour = Nombre de tokens gratuit grâce à l'happy hour + le nombre de tokens normal
		*/
		$paypal_tokens_during_happy_hour = $paypal_happy_hour_bonus + $this->config['paypal_tokens'];
		$this->paypal_tokens_during_happy_hour = $paypal_tokens_during_happy_hour;
		$this->set('paypal_tokens_during_happy_hour', $paypal_tokens_during_happy_hour);
		// Boutons pour la sidebar
		$this->set('buttons', $this->Button->find('all', ['order' => ['Button.order ASC']]));
		// Pages customs
		$this->set('cpages', $this->Cpage->find('all'));
		$this->set('nb_cpages', $this->Cpage->find('count'));
		// ExtazCMS
		$version = 1.8;
		$last_version = file_get_contents('http://extaz-cms.com/extazcms.version');
		if(!$last_version){
			$last_version = 0;
		}
		$this->version = $version;
		$this->last_version = $last_version;
		$this->set('version', $version);
		$this->set('last_version', $last_version);
		// Si JSONAPI est injoignable
		if($api->call('server.bukkit.version')[0]['result'] != 'success'){
			if($this->request->url == 'boutique'){
				$this->render('/Errors/jsonapi');
			}
		}
		else{
			$players = $api->call('players.online')[0]['success'];
			$this->set('count_players', count($players));
		}
		// Maintenance du site
		if($informations['Informations']['maintenance'] == 1){
			if($this->Auth->user('role') < 1){
				if($this->request->url != 'connexion'){
					$this->render('/Errors/maintenance');
				}
			}
		}
		// Autre
		Configure::write('Config.language', 'fra');
		$this->Auth->allow();
	}

	function afterPaypalNotification($txnId){
		$informations = $this->Informations->find('first');
		// On recup les données paypal
		$transaction = ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->findById($txnId);
		$this->log($transaction['InstantPaymentNotification']['id'], 'paypal');
		$mc_gross = $informations['Informations']['paypal_price'].'.00';
		// Si la transaction a été effectué
		if($transaction['InstantPaymentNotification']['payment_status'] == 'Completed'){
			// Si c'est bien en EUROS
			if($transaction['InstantPaymentNotification']['mc_currency'] == 'EUR'){
				// Si le prix n'a pas été modifié 
				if($transaction['InstantPaymentNotification']['mc_gross'] == $mc_gross){
					/*
					* Nombre de tokens gratuit avec un paiement via PayPal
					* paypal_happy_hour_bonus = bonus de l'happy (en %) divisé par 100 fois le nombre de tokens obtenu pour un paiement via PayPal
					*/
					$paypal_happy_hour_bonus = $informations['Informations']['happy_hour_bonus'] / 100 * $informations['Informations']['paypal_tokens'];
					/*
					* Nombre total de tokens obtenu avec un paiement via PayPal pendant une happy hour
					* paypal_tokens_during_happy_hour = Nombre de tokens gratuit grâce à l'happy hour + le nombre de tokens normal
					*/
					$paypal_tokens_during_happy_hour = $paypal_happy_hour_bonus + $informations['Informations']['paypal_tokens'];
					// Nombre de tokens sans happy hour
					$paypal_tokens = $informations['Informations']['paypal_tokens'];
					// On recup les infos de l'utlisateur
					$user = $this->User->find('first', ['conditions' => ['User.id' => $transaction['InstantPaymentNotification']['custom']]]);
					$user_tokens = $user['User']['tokens'];
					// On définit son nv nb de tokens
					if($informations['Informations']['happy_hour'] == 1){
						$new_user_tokens = $user_tokens + $paypal_tokens_during_happy_hour;
						$this->User->id = $transaction['InstantPaymentNotification']['custom'];
						$this->User->saveField('tokens', $new_user_tokens);
					}
					else{
						$new_user_tokens = $user_tokens + $paypal_tokens;
						$this->User->id = $transaction['InstantPaymentNotification']['custom'];
						$this->User->saveField('tokens', $new_user_tokens);
					}
					// Donation ladder
					if($this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]])){
						if($informations['Informations']['happy_hour'] == 1){
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]]);
							$new_user_tokens = $donationLadder['donationLadder']['tokens'] + $paypal_tokens_during_happy_hour;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $new_user_tokens);
						}
						else{
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]]);
							$new_user_tokens = $donationLadder['donationLadder']['tokens'] + $paypal_tokens;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $new_user_tokens);
						}
					}
					else{
						if($informations['Informations']['happy_hour'] == 1){
							$this->donationLadder->create;
							$this->donationLadder->saveField('user_id', $transaction['InstantPaymentNotification']['custom']);
							$this->donationLadder->saveField('tokens', $paypal_tokens_during_happy_hour);
						}
						else{
							$this->donationLadder->create;
							$this->donationLadder->saveField('user_id', $transaction['InstantPaymentNotification']['custom']);
							$this->donationLadder->saveField('tokens', $paypal_tokens);
						}
					}
				}
			}
		}
	} 
}