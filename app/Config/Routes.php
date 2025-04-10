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
$routes->post('Wilayah/InsertData', 'Wilayah::InsertData');
$routes->get('Wilayah/Edit/(:num)', 'Wilayah::Edit/$1');
$routes->post('Wilayah/UpdateData/(:num)', 'Wilayah::UpdateData/$1');
$routes->get('Wilayah/Delete/(:num)', 'Wilayah::Delete/$1');
$routes->get('User', 'User::index');
$routes->get('Batalyon', 'Batalyon::index');
$routes->get('Komando', 'Komando::index');
$routes->post('Komando/UpdateData/(:num)', 'Komando::UpdateData/$1');









