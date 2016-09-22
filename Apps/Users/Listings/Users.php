<?php

return [
    'name' => __('Listing des utilisateurs'),
    'model' => 'User',
    'fields' => [
        'firstname' => 'Prénom',
        'lastname' => 'Nom',
        'login' => 'Login',
    ],
    'add_item' => [
        [
            'appname' => 'users',
            'crud' => 'user',
            'name' => __('Ajouter un utilisateur')
        ]
    ]
];