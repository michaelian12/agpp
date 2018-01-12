<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['masuk'] = 'authentication';
$route['lupa'] = 'authentication/lupa';
$route['keluar'] = 'authentication/keluar';

$route['profil'] = 'profil';

$route['pengguna'] = 'pengguna';
$route['pengguna-tambah'] = 'pengguna/tambah';
$route['pengguna-lihat/(:any)'] = 'pengguna/ubah/$1';
$route['pengguna-hapus/(:any)'] = 'pengguna/hapus/$1';

$route['proyek'] = 'proyek';
$route['proyek-tambah'] = 'proyek/tambah';
$route['proyek-lihat/(:any)'] = 'proyek/ubah/$1';
$route['proyek-hapus/(:any)'] = 'proyek/hapus/$1';

$route['pekerjaan'] = 'pekerjaan';
$route['pekerjaan-tambah/(:any)'] = 'pekerjaan/tambah/$1';
$route['pekerjaan-lihat/(:any)'] = 'pekerjaan/ubah/$1';
$route['pekerjaan-hapus/(:any)'] = 'pekerjaan/hapus/$1';

$route['risiko'] = 'risiko';
$route['risiko-tambah/(:any)'] = 'risiko/tambah/$1';
$route['risiko-lihat/(:any)'] = 'risiko/ubah/$1';
$route['risiko-hapus/(:any)'] = 'risiko/hapus/$1';
$route['efek-hapus/(:any)'] = 'risiko/hapus_efek/$1';
$route['penyebab-hapus/(:any)'] = 'risiko/hapus_penyebab/$1';

$route['mitigasi'] = 'mitigasi';
$route['mitigasi-tambah/(:any)'] = 'mitigasi/tambah/$1';
$route['mitigasi-lihat/(:any)'] = 'mitigasi/ubah/$1';
$route['mitigasi-hapus/(:any)'] = 'mitigasi/hapus/$1';

$route['evaluasi'] = 'evaluasi';
$route['evaluasi-tambah/(:any)'] = 'evaluasi/tambah/$1';

$route['laporan'] = 'laporan';
$route['laporan-tambah/(:any)'] = 'laporan/tambah/$1';
$route['laporan-lihat'] = 'laporan/ubah';
$route['laporan-lihat/(:any)/(:any)'] = 'laporan/ubah/$1/$2';
$route['laporan-hapus/(:any)/(:any)'] = 'laporan/hapus/$1/$2';

$route['default_controller'] = 'profil';
$route['(:any)'] = 'welcome/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
