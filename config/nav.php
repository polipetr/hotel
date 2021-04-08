<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'admin' => [
        'account' => [
            'name' =>  'Създаване на акоунт',
            'actions' => [
                'view' => 'admin/account',
            ],
            'icon' => 'ti-user'
        ],
        'booking' => [
            'name' =>  'Резервация',
            'actions' => [
                'room_booking' => 'admin/room_booking',
                'event_booking' =>  'admin/event_booking'
            ],
            'icon' => 'ti-control-forward'
        ],
        'event' => [
            'name' => 'Събития',
            'actions' => [
                'view' => 'admin/event',
            ],
            'icon' => 'ti-ticket'
        ],
        'food' => [
            'name' => 'Meню',
            'actions' => [
                'view' => 'admin/food',
            ],
            'icon' => 'ti-pencil-alt'
        ],
        'room_type' => [
            'name' => 'Типове стаи',
            'actions' => [
                'view' => 'admin/room_type',
            ],
            'icon' => 'ti-home'
        ],
        'facility' => [
            'name' => 'Помещения',
            'actions' => [
                'view' => 'admin/facility',
            ],
            'icon' => 'ti-crown'
        ],
        'user' => [
            'name' => 'Гости',
            'actions' => [
                'view' => 'admin/user',
            ],
            'icon' => 'ti-user'
        ],
        'slider' => [
            'name' => 'Слайдер',
            'actions' => [
                'view' => 'admin/slider',
            ],
            'icon' => 'ti-layout-grid2'
        ],
        'Review' => [
            'name' => 'Ревюта',
            'actions' => [
                'view' => 'admin/review',
            ],
            'icon' => 'ti-star'
        ],
        'Page' => [
            'name' => 'Страници',
            'actions' => [
                'view' => 'admin/page',
            ],
            'icon' => 'ti-star'
        ],
        'Reporting' => [
            'name' => 'Статистика',
            'actions' => [
                'view' => 'admin/reporting',
            ],
            'icon' => 'ti-stats-up'
        ],
    ],

];
