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
		'application.modules.srbac.controllers.SBaseController',
			//导入扩展
		'ext.bootstrap-theme.widgets.*',
		'ext.bootstrap-theme.helpers.*',
		'ext.bootstrap-theme.behaviors.*',
	),
		'language'=>'zh_cn',
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
	 		'gii'=>array(
	 				'generatorPaths'=>array(  //添加一个gii检索的路径
// 	 						'ext.bootstrap-theme.gii',
	                         'bootstrap.gii',
	 				),
			'class'=>'system.gii.giiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1'),
				),
				'srbac' => array(
						'userclass'=>'GpDcUser', //default: User
						'userid'=>'id', //default: userid
						'username'=>'username', //default:username
						'delimeter'=>'@', //default:-
						'debug'=>false, //default :false
						'pageSize'=>10, // default : 15
						'superUser' =>'Authority', //default: Authorizer
						'css'=>'srbac.css', //default: srbac.css
						'layout'=>
// 						'application.themes.bootstrap.views.layouts.main_dc',
						'application.views.layouts.main', //default: application.views.layouts.main,
						//must be an existing alias
						'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:
						//srbac.views.authitem.unauthorized, must be an existing alias
// 						'alwaysAllowed'=>array( //default: array()
// 								'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
// 								'SiteError', 'SiteContact'),
// 						'userActions'=>array('Show','View','List'), //default: array()
						'listBoxNumberOfLines' => 15, //default : 10 'imagesPath' => 'srbac.images', // default: srbac.images 'imagesPack'=>'noia', //default: noia 'iconText'=>true, // default : false 'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
						'imagesPath' => 'srbac.images', // default: srbac.images 
						'imagesPack'=>'noia', //default: noia 
						'iconText'=>true, // default : false 
						'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header,
						//must be an existing alias 
						'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer,
						//must be an existing alias 
						'showHeader'=>true, // default: false 
						'showFooter'=>true, // default: false
						'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
						// must be an existing alias )
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
// 				array(
// 					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
// // 					'ipFilters'=>array('127.0.0.1','192.168.1.215'),
// 				),
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
		'authManager'=>array(
		// Path to SDbAuthManager in srbac module if you want to use case insensitive
		//access checking (or CDbAuthManager for case sensitive access checking)
				'class'=>'srbac.components.SDbAuthManager',
				// The database component used
				'defaultRoles'=>array('guest'),
				'connectionID'=>'db',
				// The itemTable name (default:authitem)
				'itemTable'=>'gp_dc_auth_items',
				// The assignmentTable name (default:authassignment)
				'assignmentTable'=>'gp_dc_auth_assignments',
				// The itemChildTable name (default:authitemchild)
				'itemChildTable'=>'gp_dc_auth_itemchildren',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
	
);