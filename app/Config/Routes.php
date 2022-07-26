<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('auth/login', 'Auth::login');
$routes->get('banner/update/(:num)', 'Banner::update/$1');
$routes->get('banner/restore/(:any)', 'Banner::restore/$1');
$routes->get('banner/delete/(:any)', 'Banner::delete/$1');
// $routes->get('banner/restore/(:any)', 'Banner::restore/$1');
$routes->get('banner/delete2', 'Banner::delete2');
$routes->get('/daftar/(:any)', 'Home::daftar/$1');
$routes->get('/daftar_diskon/(:any)', 'Home::daftar_diskon/$1');
$routes->get('/payment/finishMidtrans', 'Payment::finishMidtrans');
$routes->get('/payment/index', 'Payment::index');
// $routes->get('banner/index', 'Banner::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
