<?php

$adminMenu[17] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Faqs::faqs.faqs'),
        'link' => action('Uistacks\Faqs\Controllers\FaqsController@index'),
    ]
];

////old
//$adminMenu[8] = [
//        'icon' => 'table',
//        'list_head' => [
//                'name' => trans('Faqs::faqs.faqs'),
//                'link' => action('Uistacks\Faqs\Controllers\FaqsController@index'),
//        ],
//        'list_tree'=> [
//                0 => [
//                    'name' => trans('Faqs::faqs.all').' '.trans('Faqs::faqs.faqs'),
//                    'link' => '/'.App::getLocale().'/admin/faqs/dynamic',
//                ],
//                1 => [
//                    'name' => trans('Faqs::faqs.create').' '.trans('Faqs::faqs.faq'),
//                    'link' => '/'.App::getLocale().'/admin/faqs/create',
//                ]
//        ]
//];