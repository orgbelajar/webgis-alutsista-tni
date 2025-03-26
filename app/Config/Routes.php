<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('Home', 'Home::index');
$routes->get('Admin', 'Admin::index');
$routes->get('Admin/Setting', 'Admin::Setting');
$routes->post('Admin/Setting', 'Admin::PostSetting');
$routes->post('Admin/UpdateSetting', 'Admin::UpdateSetting');
$routes->get('Admin/Kodam', 'Admin::Kodam');
$routes->get('Admin/Lantamal', 'Admin::Lantamal');
$routes->get('Wilayah', 'Wilayah::index');
$routes->get('Wilayah/Input', 'Wilayah::Input');



