<?php
$adminMenu[19] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Tutorials::tutorials.manage').' '.trans('Tutorials::tutorials.tutorials'),
        'link' => '/'.App::getLocale().'/admin/tutorials',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Tutorials::tutorials.all').' '.trans('Tutorials::tutorials.courses'),
            'link' => '/'.App::getLocale().'/admin/courses',
        ],
        1 => [
            'name' => trans('Tutorials::tutorials.all').' '.trans('Tutorials::tutorials.tutorials'),
            'link' => '/'.App::getLocale().'/admin/tutorials',
        ],
        2 => [
            'name' => trans('Tutorials::tutorials.create').' '.trans('Tutorials::tutorials.tutorial'),
            'link' => '/'.App::getLocale().'/admin/tutorials/create',
        ]
    ]
];