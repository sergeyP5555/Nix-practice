<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'main',
    ],

    'main' => [
        'controller' => 'main',
        'action' => 'main',
    ],

    'account' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'menu' => [
        'controller' => 'menu',
        'action' => 'menu',
    ],

    'cart' => [
        'controller' => 'cart',
        'action' => 'cart',
    ],
    'cart/choose' => [
        'controller' => 'cart',
        'action' => 'choose',
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ]
];
