<?php
return array(
    'db' => array(
        'host' => 'mysql',
        'name' => 'phonebook',
        'user' => 'root',
        'password' => '123456'
    ),
    'routes' => array(
        '/' => 'Main::index',
        'admin' => 'Admin::index',
        'product' => 'Product::index',
        '404' => '404::index',
    )
);

