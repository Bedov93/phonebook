<?php
return array(
    'db' => array(
        'host' => 'db',
        'name' => 'phonebook',
        'user' => 'root',
        'password' => '123456'
    ),
    'routes' => array(
        '/' => 'Main::index',
        'admin' => 'Admin::index',
        'register' => 'Main::register',
        'login' => 'Main::login',
        'logout' => 'Main::logout',
        'test' => 'Main::test',
        'contacts'=> 'Contact::index',
        'contacts-delete' => 'Contact::delete',
        'contact-photo' => 'Contact::photo',
        'contact-update' => 'Contact::update',
        'contact-create' => 'Contact::create',
        'contact' => 'Contact::contact',
        '404' => '404::index',
    )
);

