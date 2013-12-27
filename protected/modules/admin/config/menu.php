<?php
if (Yii::app()->user->isGuest) {

    $array = [
        [
            'label' => 'Авторизация на сайте',
            'url' => ['/admin/index/login'],
            'active' => true,
        ],
    ];

} else {

    $array = [
        [
            'label' => 'Водные ресурсы',
            'url' => ['/admin/lakes/index'],
        ],
        [
            'label' => 'Типы водных ресурсов',
            'url' => ['/admin/waterObject/admin'],
        ],
        [
            'label' => 'Выйти из аккаунта (' . Yii::app()->user->name . ')',
            'url' => ['/admin/index/logout'],
        ],
    ];
}
return $array;