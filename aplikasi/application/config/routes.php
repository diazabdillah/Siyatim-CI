<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'navigation';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Navigasi Landing Page
$route['explore-panti'] = 'navigation/explorePanti';
$route['explore-panti/(:num)'] = 'navigation/explorePanti';
$route['panti-asuhan/(:num)'] = 'navigation/detailPanti';

$route['about'] = 'navigation/about';
$route['blog'] = 'navigation/blog';
$route['contact'] = 'navigation/contact';
$route['faq'] = 'navigation/faq';

//Auth siyatim.com
$route['login'] = 'auth/loginDonatur';
$route['daftar'] = 'auth/daftarDonatur';
$route['reset-password'] = 'auth/resetPasswordDonatur';
// $route['donatur/reset'] = 'donatur/resetPasswordView';

$route['panti/login'] = 'panti';
$route['daftarkan-panti'] = 'auth/daftarkanPanti';

$route['admin/login-rahasia-banget'] = 'adminRahasiaBanget';
$route['donatur/login'] = 'donatur';

//Dashboard siyatim.com

//Dashboard Admin
$route['admin/dashboard'] = 'adminRahasiaBanget/dashboard';
$route['admin/dashboard/data-donasi'] = 'adminRahasiaBanget/dashboardDonasi';
$route['admin/dashboard/data-donasi/validasi/(.+)'] = 'adminRahasiaBanget/donasiValidasi/$1';
$route['admin/dashboard/data-donasi/pendingkan/(.+)'] = 'adminRahasiaBanget/donasiPendingkan/$1';

$route['admin/dashboard/data-donatur'] = 'adminRahasiaBanget/dashboardDonatur';
$route['admin/dashboard/data-donatur/unverifikasi/(.+)'] = 'adminRahasiaBanget/donaturUnverifikasi/$1';
$route['admin/dashboard/data-donatur/verifikasi/(.+)'] = 'adminRahasiaBanget/donaturVerifikasi/$1';
$route['admin/dashboard/data-donatur/hapus/(.+)'] = 'adminRahasiaBanget/userDonaturHapus/$1';


$route['admin/dashboard/data-panti'] = 'adminRahasiaBanget/dashboardPanti';
$route['admin/dashboard/data-panti/detail/(.+)'] = 'adminRahasiaBanget/pantiDetail/$1';
$route['admin/dashboard/data-panti/upload-bukti-transfer'] = 'adminRahasiaBanget/uploadBuktiTransfer';
$route['admin/dashboard/data-panti/hapus/(.+)'] = 'adminRahasiaBanget/userPantiHapus/$1';
$route['admin/dashboard/data-panti/reset-password/(.+)'] = 'adminRahasiaBanget/pantiResetPassword/$1';
$route['admin/dashboard/data-panti/nonaktifkan/(.+)'] = 'adminRahasiaBanget/pantiNonaktifkan/$1';
$route['admin/dashboard/data-panti/aktifkan/(.+)'] = 'adminRahasiaBanget/pantiAktifkan/$1';

$route['admin/dashboard/pengaturan'] = 'adminRahasiaBanget/pengaturan';
$route['admin/dashboard/ganti-password'] = 'adminRahasiaBanget/gantiPassword';
$route['admin/dashboard/ganti-foto'] = 'adminRahasiaBanget/gantiFoto';


$route['admin/dashboard/logout'] = 'adminRahasiaBanget/logout';

//Dashboard Panti
$route['panti/dashboard'] = 'panti/dashboard';
$route['panti/dashboard/logout'] = 'panti/logout';
$route['panti/dashboard/upload-laporan'] = 'panti/uploadLaporan';
$route['panti/dashboard/ganti-password'] = 'panti/gantiPassword';



//Dashboard donatur
$route['donatur/dashboard'] = 'donatur/dashboard';
$route['donatur/dashboard/donasi/(:num)'] = 'donatur/detailDonasi/$1';
$route['donatur/dashboard/donasi/print/(:num)'] = 'donatur/detailDonasiPrint/$1';
$route['donatur/dashboard/logout'] = 'donatur/logout';
$route['donatur/dashboard/pengaturan'] = 'donatur/pengaturan';
$route['donatur/dashboard/ganti-password'] = 'donatur/gantiPassword';
$route['donatur/dashboard/ganti-foto'] = 'donatur/gantiFoto';