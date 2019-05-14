<?php

$adminMenu[3] = [
    'icon' => 'user',
    'list_head' => [
        'name' => trans('Users::users.admin'),
        'link' => action('Uistacks\Users\Controllers\AdminController@index'),
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Users::users.all').' '.trans('Users::users.admin'),
            'link' => action('Uistacks\Users\Controllers\AdminController@index'),
        ],
        1 => [
            'name' => trans('Users::users.create').' '.trans('Users::users.admin'),
            'link' => action('Uistacks\Users\Controllers\AdminController@create'),
        ]
    ]
];

$adminMenu[4] = [
    'icon' => 'users',
    'list_head' => [
            'name' => trans('Users::users.users'),
        'link' => action('Uistacks\Users\Controllers\UsersController@index'),
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Users::users.all').' '.trans('Users::users.users'),
            'link' => action('Uistacks\Users\Controllers\UsersController@index'),
        ],
        1 => [
            'name' => trans('Users::users.create').' '.trans('Users::users.user'),
            'link' => action('Uistacks\Users\Controllers\UsersController@create'),
        ]

    ]
];