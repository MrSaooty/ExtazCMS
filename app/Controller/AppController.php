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

  public $uses = ['Informations', 'User', 'starpassHistory', 'Support', 'donationLadder'];

  public $helpers = ['Html', 'Form', 'PaypalIpn.Paypal'];

  public $components = [
	'Session',
	'Auth' => [
	  'loginRedirect' => ['controller' => 'posts', 'action' => 'index'],
	  'logoutRedirect' => ['controller' => 'posts', 'action' => 'index']
	],
	'Cookie'
  ];

  public function beforeFilter(){
  	if((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))){
		$this->layout = 'admin';
	}
	// Variable qui regroupe toutes les infos depuis la bdd 
	$this->set('informations', $this->Informations->find('first'));
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
	$this->set('facebook_url', $informations['Informations']['facebook_url']);
	$this->set('twitter_url', $informations['Informations']['twitter_url']);
	$this->set('use_store', $informations['Informations']['use_store']);
	$this->set('use_paypal', $informations['Informations']['use_paypal']);
	$this->set('use_economy', $informations['Informations']['use_economy']);
	$this->set('use_server_money', $informations['Informations']['use_server_money']);
	$this->set('use_team', $informations['Informations']['use_team']);
	$this->set('use_contact', $informations['Informations']['use_contact']);
	$this->set('use_rules', $informations['Informations']['use_rules']);
	$this->set('use_donation_ladder', $informations['Informations']['use_donation_ladder']);
	$this->set('happy_hour', $informations['Informations']['happy_hour']);
	$this->set('happy_hour_bonus', $informations['Informations']['happy_hour_bonus']);
	$this->set('rules', $informations['Informations']['rules']);
	// Le reste
	$this->set('connected', $this->Auth->user());
	$this->set('username', $this->Auth->user('username'));
	$this->set('email', $this->Auth->user('email'));
	if($this->Auth->user()){
	  $userInformation = $this->User->find('first', ['conditions' => ['User.id' => $this->Auth->user('id')]]);
	  $this->set('tokens', $userInformation['User']['tokens']);
	  $this->set('allow_email', $userInformation['User']['allow_email']);
	}
	$this->set('role', $this->Auth->user('role'));
	$this->set('tickets', $this->Support->find('count', ['conditions' => ['Support.username' => $this->Auth->user('username'), 'Support.resolved' => 0]]));
	$this->set('nbTicketsAdmin', $this->Support->find('count', ['conditions' => ['Support.resolved' => '0']]));

	// Donation Ladder
	if($this->donationLadder->find('all')){
	  $this->set('bestDonator', $this->donationLadder->find('first', ['order' => ['donationLadder.tokens DESC']]));
	  $this->set('lastDonator', $this->donationLadder->find('first', ['order' => ['donationLadder.updated DESC']]));
	  $this->set('nbDonator', $this->donationLadder->find('count'));
	}
	else{
	  $this->set('nbDonator', $this->donationLadder->find('count'));
	}


	$this->Cookie->httpOnly = true;
	if(!$this->Auth->loggedIn() && $this->Cookie->read('rememberMe')){
	  $cookie = $this->Cookie->read('rememberMe');
	  $this->loadModel('User');
	  $user = $this->User->find('first', array('conditions' => array('User.username' => $cookie['username'], 'User.password' => $cookie['password'])));
	  if($user && !$this->Auth->login($user['User'])){
		$this->redirect('/users/logout');
	  }
	}
	Configure::write('Config.language', 'fra');
	$this->Auth->allow();
	$this->set('authUser', $this->Auth->user());
	$this->Auth->authError = '<div class="servive-block servive-block-default">
							  <h2 class="heading-md">Erreur !</h2>
							  <p>Vous ne pouvez pas accéder à cette page, connectez vous et réessayez</p>
							  </div>';
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
					// Nombre de tokens avec l'happy hour
					$paypal_tokens_happy_hour = $informations['Informations']['happy_hour_bonus']/100 * $informations['Informations']['paypal_tokens'] + $informations['Informations']['paypal_tokens'];
					// Nombre de tokens sans happy hour
					$paypal_tokens = $informations['Informations']['paypal_tokens'];
					// On recup les infos de l'utlisateur
					$user = $this->User->find('first', ['conditions' => ['User.id' => $transaction['InstantPaymentNotification']['custom']]]);
					$userTokens = $user['User']['tokens'];
					// On définit son nv nb de tokens
					if($informations['Informations']['happy_hour'] == 1){
						$newTokens = $userTokens + $paypal_tokens_happy_hour;
						$this->User->id = $transaction['InstantPaymentNotification']['custom'];
						$this->User->saveField('tokens', $newTokens);
					}
					else{
						$newTokens = $userTokens + $paypal_tokens;
						$this->User->id = $transaction['InstantPaymentNotification']['custom'];
						$this->User->saveField('tokens', $newTokens);
					}
					// Donation ladder
					if($this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]])){
						if($informations['Informations']['happy_hour'] == 1){
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]]);
							$newTokens = $donationLadder['donationLadder']['tokens'] + $paypal_tokens_happy_hour;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $newTokens);
						}
						else{
							$donationLadder = $this->donationLadder->find('first', ['conditions' => ['donationLadder.user_id' => $transaction['InstantPaymentNotification']['custom']]]);
							$newTokens = $donationLadder['donationLadder']['tokens'] + $paypal_tokens;
							$this->donationLadder->id = $donationLadder['donationLadder']['id'];
							$this->donationLadder->saveField('tokens', $newTokens);
						}
					}
					else{
						if($informations['Informations']['happy_hour'] == 1){
							$this->donationLadder->create;
							$this->donationLadder->saveField('user_id', $transaction['InstantPaymentNotification']['custom']);
							$this->donationLadder->saveField('tokens', $paypal_tokens_happy_hour);
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