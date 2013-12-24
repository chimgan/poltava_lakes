<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('admin', dirname(__FILE__).'/../modules/admin');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Poltava Lakes',
    'sourceLanguage' => 'ru',
    'language' => 'en',
    'timeZone' => 'Europe/Moscow',
    'homeUrl' => 'admin/index/index',

    // preloading component
    'preload' => [
        'log',
        'bootstrap',
    ],

    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
    ],

    'modules' => [
        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            'ipFilters' => ['127.0.0.1','::1'],
            'generatorPaths' => [
                'bootstrap.gii',
            ],
        ],
        'admin' => [
            'defaultController' => 'index',
            'layout' => 'main',
        ],
    ],

    // application components
    'components' => [
        'user' => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => '/signin',
        ],

        'bootstrap' => [
            'class' => 'application.extensions.bootstrap.components.Bootstrap',
        ],

        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'routes.php',
        ],

        'db' => require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'database.php',

        'log' => require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'log.php',

        'errorHandler' => [
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ],
    ],

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => [
        // this is used in contact page
        'adminEmail' => 'kovtunovvladislav@gmail.com',
        'domainUrl' => 'http://poltava-lakes.local',
        'allowedExts' => ["gif", "jpeg", "jpg", "png"],
        'max_upload_file_size' => 2120000, // 2Mb
    ],
];