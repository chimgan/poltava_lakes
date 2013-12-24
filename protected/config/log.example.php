<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladislav Kovtunov
 * Date: 21.09.13
 * Time: 12:34
 */

return [
    'class' => 'CLogRouter',
    'routes' => [
        [
            'class' => 'CFileLogRoute',
            'levels' => 'error, warning',
        ],
//        ['class'=>'CWebLogRoute',],
    ],
];