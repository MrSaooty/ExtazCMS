<?php
class DATABASE_CONFIG {
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1', // Hôte
		'login' => 'root', // Nom d'utilisateur
		'password' => '', // Mot de passe
		'database' => 'cms', // Database
		'prefix' => 'extaz_',
		'encoding' => 'utf8',
	);
}