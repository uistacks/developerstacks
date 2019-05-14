<?php

$adminMenu[18] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Blogs::blogs.manage').' '.trans('Blogs::blogs.blogs'),
        'link' => action('Uistacks\Blogs\Controllers\BlogsController@index'),
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Blogs::blogs.all').' '.trans('Blogs::blogs.blogs'),
            'link' => action('Uistacks\Blogs\Controllers\BlogsController@index'),
        ],
        1 => [
            'name' => trans('Blogs::blogs.create').' '.trans('Blogs::blogs.blog'),
            'link' => action('Uistacks\Blogs\Controllers\BlogsController@create'),
        ]
    ]
];