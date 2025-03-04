<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('create-db', function()
{
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('db_spk_moora')) {
        echo 'Database created!';
    }
});

// login
$routes->get('login', 'Auth::login');
$routes->post('ceklogin', 'Auth::cekLogin');
$routes->get('logout', 'Auth::logout');


$routes->get('/', 'Home::index');

// kriteria
$routes->presenter('kriteria');

// subkriteria
$routes->presenter('subkriteria');

// alternatif
$routes->presenter('alternatif');

// penilaian
$routes->get('penilaian', 'Penilaian::index');
$routes->get('penilaian/input/(:num)', 'Penilaian::input/$1');
$routes->post('penilaian/save', 'Penilaian::save');
$routes->get('penilaian/edit/(:num)', 'Penilaian::edit/$1');
$routes->post('penilaian/update', 'Penilaian::update');

// perhitungan
$routes->get('perhitungan', 'Perhitungan::index');

// hasil
$routes->get('hasil', 'Perhitungan::hasil');

// user
$routes->get('profil', 'User::profil');
$routes->post('update/profil/(:num)', 'User::updateProfil/$1');
$routes->presenter('user');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
