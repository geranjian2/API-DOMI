<?php
$routes = [
    [
        'name' => 'getUser',
        'route' => '/user/getid/',
        'method' => 'GET'
    ],
    [
        'name' => 'createUser',
        'route' => '/user/save/',
        'method' => 'POST'
    ],
    [
        'name' => 'updateUser',
        'route' => '/user/update/',
        'method' => 'PUT'
    ],
    [
        'name' => 'getUsers',
        'route' => '/user/all/',
        'method' => 'GET'
    ],
    [
        'name' => 'deleteUser',
        'route' => '/user/delete/',
        'method' => 'DELETE'
    ],
    [
        'name' => 'loginUser',
        'route' => '/user/login/',
        'method' => 'POST'
    ]
];
