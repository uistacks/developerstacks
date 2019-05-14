<?php

$adminMenu[10] = [
    'icon' => 'table',
    'list_head' => [
        'name' => "Categories Management",
        'link' => action('Uistacks\Categories\Controllers\CategoriesController@index'),
    ],
    'list_tree'=> [
        0 => [
            'name' => "Categories",
            'link' => action('Uistacks\Categories\Controllers\CategoriesController@index'),
        ],
        1 => [
            'name' => trans('Categories::categories.create').' '.trans('Categories::categories.category'),
            'link' => action('Uistacks\Categories\Controllers\CategoriesController@create'),
        ]
    ]
];