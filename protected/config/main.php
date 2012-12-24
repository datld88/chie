<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Chie.vn - Được chơi là hạnh phúc',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.rights.*',
                'application.modules.rights.components.*', 
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'@chie123$',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'admin',
                'rights'=>array(
                    'superuserName'=>'admin',
                    'install'=>true,      // Enables the installer.
                ),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
                        'class'=>'RWebUser', 
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
                    'urlFormat'=>'path',
                    'showScriptName'=>false,
                    'urlSuffix'=>'.html',
                    'rules'=>array(
                        '<controller:\w+>/<action:\w+>/<id:\d+>-<title:[\d\w\-_]+>'=>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                        array(
                                'class'=>'ext.sitemapgenerator.SGUrlRule',
                                'route'=>'/sitemap', // Optional. Default: '/sitemap'
                        ),
                    ),
                ),   
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                'db' => require(dirname(__FILE__) . '/db.php'),
		
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
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
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                'authManager'=>array(
                    'class'=>'RDbAuthManager',     // Provides support authorization item sorting.
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);