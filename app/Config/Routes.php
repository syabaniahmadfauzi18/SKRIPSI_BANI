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
$routes->get('/', 'Home::index');
$routes->get('/userlogin', 'UserPages::ViewLoginPageUser');
$routes->get('/home', 'UserPages::ViewHomePageUser');
$routes->get('/checkin', 'UserPages::ViewCheckinPage');
$routes->get('/reqAnnualLeave/(:any)', 'UserPages::ViewRequestAnnual/$1');
$routes->post('/reqAnnualLeave/send', 'UserPages::SendReqAnnual');
$routes->get('/user/checkin/(:any)/(:any)', 'UserPages::SendCheckIn/$1/$2');

$routes->get('/adminDashboard', 'AdminPages::ViewAdminPage');
$routes->get('/adminMasterData', 'AdminPages::ViewAdminMasterDataPage');
$routes->get('/adminAnnualLeaved', 'AdminPages::ViewAdminAnnualLeavedPage');
$routes->get('/adminHistoryAbsen', 'AdminPages::ViewAdminHistorydPage');
$routes->get('/adminSetting', 'AdminPages::ViewAdminSettingPage');
$routes->post('/adminSetting/Update', 'AdminPages::UpdateSetting');
$routes->get('/adminHistoryAbsen/(:any)', 'AdminPages::ViewAdminHistorydPageWithParam/$1');
$routes->post('/updateKaryawan', 'AdminPages::UpdateKaryawan');
$routes->post('/adminMasterData/tambah', 'AdminPages::TambahKaryawan');
$routes->get('/adminAnnualLeaved/updateAnnualLeave/approved/(:any)/(:any)', 'AdminPages::UpdateAnnualLeaveApproved/$1/$2');
$routes->get('/adminAnnualLeaved/updateAnnualLeave/rejected/(:any)/(:any)', 'AdminPages::UpdateAnnualLeaveRejected/$1/$2');
$routes->get('/adminMasterData/tambahKaryawan', 'AdminPages::ViewTambahKaryawan');
$routes->get('/adminMasterData/editDataKaryawan/(:alphanum)', 'AdminPages::ViewEditKaryawan/$1');
$routes->get('/adminMasterData/DeleteKaryawan/(:alphanum)', 'AdminPages::DeleteKaryawan/$1');

$routes->get('/kepsekDashboard', 'KepSekPages::ViewDashboard');
$routes->get('/kepsekMasterData', 'KepSekPages::ViewMasterData');
$routes->get('/kepsekHistoryAbsen', 'KepSekPages::ViewHistoryData');
$routes->get('/kepsekHistoryAbsen/(:any)', 'KepSekPages::ViewHistorydPageWithParam/$1');

service('auth')->routes($routes);

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
