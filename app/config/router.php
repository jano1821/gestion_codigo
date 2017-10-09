<?php
use Phalcon\Mvc\Router;

$router = new Router(false);
$router->add(
    '/catalogo_codigo/like',
    [
       'controller' => 'catalogo_codigo',
       'action'     => 'like'
    ]
);

$router = $di->getRouter();

// Define your routes here

$router->handle();