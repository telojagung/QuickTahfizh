<?php

define('APP_CONFIG_DIR', dirname(__FILE__) . '/application');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Quick Tahfizh',
	// preloading 'log' component
	'preload' => array('log'),
	'aliases' => array(
		'bootstrap' => 'ext.bootstrap',
		'facebook' => 'application.components.facebook',
	),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'administration',
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
		),
	),
	'theme' => 'default',
	// application components
	'components' => array(
		'db' => require(APP_CONFIG_DIR . '/database.php'),
		'facebook' => array(
			'class' => 'facebook\\Component',
			'appId' => '289024961198744',
			'appSecret' => 'acacc53dfcf340408fdc54b9bc206ad8',
			'scope' => 'email',
			'registerUrl' => array('/user/register')
		),
		'bootstrap' => array(
			'class' => '\\bootstrap\\Component',
			'useLess' => true, //on theming development mode useLess set true
			'autoRegisterScript' => true,
		),
		// uncomment the following to use a MySQL database
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				  array(
				  'class'=>'CWebLogRoute',
				  ),
				 */
				array(
					'class' => 'CProfileLogRoute',
					'enabled' => YII_DEBUG
				),
			),
		),
		'request' => array(
			'enableCsrfValidation' => true,
			'csrfTokenName' => 'iCsrfToken',
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'user' => array(
			'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);