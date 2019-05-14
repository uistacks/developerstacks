<?php
/*$adminMenu[14] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Locations::locations.locations'),
        'link' => '/'.App::getLocale().'/admin/countries',
    ],
    'list_tree'=> [
        0 => [
            'name' => "Manage Countries",
            'link' => '/'.App::getLocale().'/admin/countries',
        ],
        1 => [
            'name' => "Manage States",
            'link' => '/'.App::getLocale().'/admin/states',
        ],
        2 => [
            'name' => "Manage Cities",
            'link' => '/'.App::getLocale().'/admin/cities',
        ]
    ]
];*/
$adminMenu[14] = [
    'icon' => 'table',
    'list_head' => [
        'name' => 'Manage Countries',
        'link' => action('Uistacks\Locations\Controllers\CountriesController@index'),
    ]
];
$adminMenu[15] = [
    'icon' => 'table',
    'list_head' => [
        'name' => 'Manage States',
        'link' => action('Uistacks\Locations\Controllers\StatesController@index'),
    ]
];
$adminMenu[16] = [
    'icon' => 'table',
    'list_head' => [
        'name' => 'Manage Cities',
        'link' => action('Uistacks\Locations\Controllers\CitiesController@index'),
    ]
];