<?php

if (YII_ENV == 'dev') {
	return [
		'class'    => 'yii\db\Connection',
		'dsn'      => 'mysql:host=10.3.2.74;dbname=ahca_state_report',
		'username' => 'root',
		'password' => 'Welcome123',
		'charset'  => 'utf8',
	];
} else {
	return [
		'class'    => 'yii\db\Connection',
		'dsn'      => 'mysql:host=localhost;dbname=ahca_state_report',
		'username' => 'root',
		'password' => 'Welcome123',
		'charset'  => 'utf8',
	];
}
