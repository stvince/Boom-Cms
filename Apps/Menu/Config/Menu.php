<?php
return [
    'required' => true,
    'icon' => 'fa-bars',
    'default_ctrl' => 'menus',
    'default_listing' => 'menus',


    'name' => __('Menu'),
    'title' => 'title',

    'appdesk' => [
        'menus' => [
            'name' => __('Listing des menus'),
            'model' => 'Menus',
            'fields' => [
                'title' => 'Titre du menu'
            ],
            'add_item' => [
                [
                    'appname' => 'menu',
                    'crud' => 'menus',
                    'name' => __('Ajouter un menu')
                ]
            ]
        ]
    ]
];