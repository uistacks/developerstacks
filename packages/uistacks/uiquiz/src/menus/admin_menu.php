<?php
$adminMenu[21] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Uiquiz::quiz.manage').' '.trans('Uiquiz::quiz.quiz'),
        'link' => '/'.App::getLocale().'/admin/topics',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Uiquiz::quiz.all').' '.trans('Uiquiz::quiz.topic'),
            'link' => '/'.App::getLocale().'/admin/topics',
        ],
        1 => [
            'name' => trans('Uiquiz::quiz.all').' '.trans('Uiquiz::quiz.questions'),
            'link' => '/'.App::getLocale().'/admin/questions',
        ],
        2 => [
            'name' => trans('Uiquiz::quiz.all').' '.trans('Uiquiz::quiz.questions-options'),
            'link' => '/'.App::getLocale().'/admin/questions-options',
        ],
        3 => [
            'name' => trans('Uiquiz::quiz.create').' '.trans('Uiquiz::quiz.quiz'),
            'link' => '/'.App::getLocale().'/admin/quiz/create',
        ]
    ]
];