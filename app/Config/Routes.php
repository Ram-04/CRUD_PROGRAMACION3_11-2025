<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('produclist', 'Nawebona::index');
$routes->get('crear', 'Nawebona::crear');
$routes->post('guardar', 'Nawebona::guardar');
$routes->get('borrar/(:num)', 'Nawebona::borrar/$1');
$routes->get('editar/(:num)', 'Nawebona::editar/$1');
$routes->post('actualizar', 'Nawebona::actualizar');