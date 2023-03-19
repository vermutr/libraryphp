<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('books', 'BooksController');
Routing::get('cart', 'CartController');
Routing::get('contacts', 'ContactsController');
Routing::get('main', 'MainController');
Routing::get('profile', 'ProfileController');
Routing::post('login', 'LoginController');
Routing::post('addBook', 'BooksController');
Routing::post('buyBook', 'BooksController');
Routing::get('deleteBook', 'ProfileController');
Routing::get('deleteFromCart', 'CartController');
Routing::post('order', 'CartController');

Routing::run($path);

