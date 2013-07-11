<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',		
	'name'=>'云游乐运营数据展现平台',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
//使用bootstrap 主题
	'theme'=>'bootstrap',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
			//导入扩展
		'ext.bootstrap-theme.widgets.*',
		'ext.bootstrap-theme.helpers.*',
		'ext.bootstrap-theme.behaviors.*',
	),

// 	'modules'=>array(
// 		// uncomment the following to enable the Gii tool
// 		/*
// 		'gii'=>array(
// 			'class'=>'system.gii.GiiModule',
// 			'password'=>'Enter Your Password Here',
// 			// If removed, Gii defaults to localhost only. Edit carefully to taste.
// 			'ipFilters'=>array('127.0.0.1','::1'),
// 		),
// 		*/
// 	),

	'modules'=>array(
	     	'admin',
	 		'gii'=>array(
	 				'generatorPaths'=>array(  //添加一个gii检索的路径
// 	 						'ext.bootstrap-theme.gii',
	                         'bootstrap.gii',
	 				),
			'class'=>'system.gii.giiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1'),
				),
		),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array(
// 				'class'=>'ext.bootstrap.components.Bootstrap',
		        'class'=>'bootstrap.components.Bootstrap',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
// 		'db'=>array(
// 			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
// 		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=wasu_game_data_center',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'abcd1234',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);