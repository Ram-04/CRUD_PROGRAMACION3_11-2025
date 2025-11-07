<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// estas son las rutas para el sistema de gestion de productos
$routes->get('/', 'Home::index');
// rutas para el controlador 'Nawebona.php'
$routes->get('produclist', 'Nawebona::index');
$routes->get('crear', 'Nawebona::crear');
$routes->post('guardar', 'Nawebona::guardar');
$routes->get('borrar/(:num)', 'Nawebona::borrar/$1');
$routes->get('editar/(:num)', 'Nawebona::editar/$1');
$routes->post('actualizar', 'Nawebona::actualizar');