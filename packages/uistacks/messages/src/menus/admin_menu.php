<?php
$adminMenu[24] = [
        'icon' => 'table',
        'list_head' => [
                'name' => trans('Messages::messages.messages'),
                'link' => '/'.App::getLocale().'/admin/messages',
        ],
        'list_tree'=> [
                0 => [
                    'name' => trans('Messages::messages.all_messages'),
                    'link' => '/'.App::getLocale().'/admin/messages',
                ],
                1 => [
                    'name' => 'Compose Message',
                    'link' => '/'.App::getLocale().'/admin/messages/create',
                ]
        ]
];