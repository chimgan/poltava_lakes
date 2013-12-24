<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return [
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Poltava Lakes',

	// preloading 'log' component
	'preload' => [
        'log'
    ],

	// application components
	'components'=>array(
        'db' => require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'database.php',

        'log' => require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'log.php',
	),
];