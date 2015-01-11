<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', ['controller' => 'posts', 'action' => 'index']);
	Router::connect('/admin', ['controller' => 'pages', 'action' => 'stats', 'admin' => true]);
	Router::connect('/connexion', ['controller' => 'users', 'action' => 'login']);
	Router::connect('/deconnexion', ['controller' => 'users', 'action' => 'logout']);
	Router::connect('/inscription', ['controller' => 'users', 'action' => 'signup']);
	Router::connect('/forgotpassword', ['controller' => 'users', 'action' => 'forgot_password']);
	Router::connect('/reglement', ['controller' => 'pages', 'action' => 'rules']);
	Router::connect('/recharger', ['controller' => 'shops', 'action' => 'reload']);
	Router::connect('/boutique', ['controller' => 'shops', 'action' => 'index']);
	// Router::connect('/boutique/:page', ['controller' => 'shops', 'action' => 'index'], ['pass' => ['page'], 'page' => '[0-9]+']);
	Router::connect('/starpass', ['controller' => 'shops', 'action' => 'starpass']);
	Router::connect('/contact', ['controller' => 'pages', 'action' => 'contact']);
	Router::connect('/admin/stats', ['controller' => 'pages', 'action' => 'stats', 'admin' => true]);
	Router::connect('/support', ['controller' => 'pages', 'action' => 'add_ticket']);
	Router::connect('/admin/manage_tickets', ['controller' => 'pages', 'action' => 'manage_tickets', 'admin' => true]);
	Router::connect('/tickets', ['controller' => 'pages', 'action' => 'list_tickets']);
	Router::connect('/tickets/:id', ['controller' => 'pages', 'action' => 'view_ticket'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/delete_support_comment/:id', ['controller' => 'pages', 'action' => 'delete_support_comment'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/open_ticket/:id', ['controller' => 'pages', 'action' => 'open_ticket'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/close_ticket/:id', ['controller' => 'pages', 'action' => 'close_ticket'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/close_my_ticket/:id', ['controller' => 'pages', 'action' => 'close_my_ticket'], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/answer_ticket', ['controller' => 'pages', 'action' => 'answer_ticket']);
	Router::connect('/equipe', ['controller' => 'pages', 'action' => 'team']);
	Router::connect('/admin/add_member', ['controller' => 'pages', 'action' => 'add_member', 'admin' => true]);
	Router::connect('/admin/list_member', ['controller' => 'pages', 'action' => 'list_member', 'admin' => true]);
	Router::connect('/admin/edit_member/:id', ['controller' => 'pages', 'action' => 'edit_member', 'admin' => true], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/admin/delete_member/:id', ['controller' => 'pages', 'action' => 'delete_member', 'admin' => true], ['pass' => ['id'], 'id' => '[0-9]+']);
	Router::connect('/admin/shop_history', ['controller' => 'pages', 'action' => 'shop_history', 'admin' => true]);
	Router::connect('/admin/starpass_history', ['controller' => 'pages', 'action' => 'starpass_history', 'admin' => true]);
	Router::connect('/admin/paypal_history', ['controller' => 'pages', 'action' => 'paypal_history', 'admin' => true]);
	Router::connect('/admin/informations', ['controller' => 'informations', 'action' => 'index', 'admin' => true]);
	Router::connect('/:slug-:id', ['controller' => 'posts', 'action' => 'read'], ['pass' => ['slug', 'id'], 'slug' => '[a-z0-9\-]+', 'id' => '[0-9]+']);

	/* Paypal IPN plugin */
	Router::connect('/paypal_ipn/process', array('plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'process'));
	/* Optional Route, but nice for administration */
	Router::connect('/paypal_ipn/:action/*', array('admin' => 'true', 'plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'index'));
	/* End Paypal IPN plugin */

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
