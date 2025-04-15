<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');

// Aktifkan auto routing
$routes->setAutoRoute(true); // ✅ aktifkan routing otomatis

/*
| --------------------------------------------------------------------
| WARNING: AUTO ROUTING LEGACY
| --------------------------------------------------------------------
| Auto Routing sangat memudahkan saat development, tapi bisa berisiko
| saat production (karena semua controller bisa diakses).
| Gunakan dengan hati-hati, atau gunakan Improved Auto Routing + Attributes.
*/
