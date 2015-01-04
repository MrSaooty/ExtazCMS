<?php
class DATABASE_CONFIG {
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost', // Hôte
		'login' => 'root', // Nom d'utilisateur
		'password' => '', // Mot de passe
		'database' => 'cms', // Database
		'prefix' => 'extaz_',
		'encoding' => 'utf8',
	);
}