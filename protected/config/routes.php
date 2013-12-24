<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladislav Kovtunov
 * Date: 21.09.13
 * Time: 12:34
 */

return [
    // Initial routs
    'signin'  => 'admin/index/login',
    'signout' => 'admin/index/logout',

    // Admin module
    'admin'                                         => 'admin/index/index',
    'admin/<controller:\w+>'                        => 'admin/<controller>/index',
    'admin/<controller:\w+>/<action:\w+>/<id:\d+>'  => 'admin/<controller>/<action>',
    'admin/<controller:\w+>/<action:\w+>'           => 'admin/<controller>/<action>',

    // Default routes
    '<module>/<controller:\w+>'                         => '<module>/<controller>/index',
    '<module>/<controller:\w+>/<action:\w+>/<id:\d+>'   => '<module>/<controller>/<action>',
    '<module>/<controller:\w+>/<action:\w+>'            => '<module>/<controller>/<action>',
];