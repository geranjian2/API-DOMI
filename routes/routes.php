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
        'method' => 'POST'
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
    ],
    [
        'name' => 'logoutUser',
        'route' => '/user/logout/',
        'method' => 'POST'
    ],
    [
        'name' => 'getAllRestaurants',
        'route' => '/restaurant/all/',
        'method' => 'GET'
    ],
    [
        'name' => 'productByIdRestaurant',
        'route' => '/product/getbyidrestaurant/',
        'method' => 'GET'
    ],
    [
        'name' => 'getAllProduct',
        'route' => '/product/all/',
        'method' => 'GET'
    ],
    [
        'name' => 'saveProduct',
        'route' => '/product/save/',
        'method' => 'POST'
    ],
    [
        'name' => 'saveOrder',
        'route' => '/order/save/',
        'method' => 'POST'
    ],
    [
        'name' => 'orderDetailById',
        'route' => '/order_details/getByOrderDetail/',
        'method' => 'GET'
    ],
    [
        'name' => 'updateProduct',
        'route' => '/product/update/',
        'method' => 'POST'
    ],
    [
        'name' => 'deleteProduct',
        'route' => '/product/delete/',
        'method' => 'POST'
    ]
];
