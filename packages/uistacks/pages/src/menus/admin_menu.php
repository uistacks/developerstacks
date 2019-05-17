<?php

//$adminMenu[8] = [
//    'icon' => 'table',
//    'list_head' => [
//        'name' => trans('Pages::pages.static_pages'),
//        'link' => action('Uistacks\Pages\Controllers\PagesController@index'),
//    ]
//];

$adminMenu[8] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Pages::pages.pages'),
        'link' => action('Uistacks\Pages\Controllers\PagesController@index')
    ],
    'list_tree'=> [
        0 => [
            'name' => 'List CMS',
            'link' => action('Uistacks\Pages\Controllers\PagesController@index'),
        ],
        /*1 => [
            'name' => trans('Pages::pages.all').' '.trans('Pages::pages.pages'),
            'link' => action('Uistacks\Pages\Controllers\PagesController@dynamic')
        ],*/
        2 => [
            'name' => trans('Pages::pages.create').' '.trans('Pages::pages.page'),
            'link' => action('Uistacks\Pages\Controllers\PagesController@create')
        ]
    ]
];