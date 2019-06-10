<?php
$adminMenu[22] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Qas::qas.manage').' '.trans('Qas::qas.qna'),
        'link' => '/'.App::getLocale().'/admin/qnas',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Qas::qas.all').' '.trans('Qas::qas.qna'),
            'link' => '/'.App::getLocale().'/admin/qnas',
        ],
        1 => [
            'name' => trans('Qas::qas.create').' '.trans('Qas::qas.qna'),
            'link' => '/'.App::getLocale().'/admin/qnas/create',
        ]
    ]
];