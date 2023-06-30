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
$route['default_controller'] = 'UserAccess';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['userlogin'] = 'UserAccess/validate_login';

$route['signup'] = 'UserAccess/signup';
$route['forgot'] = 'UserAccess/forgot';

$route['dashboard-patient'] = 'Patient/dashboard';
$route['patient-information'] = 'Patient/patient_info';
$route['medical-history'] = 'Patient/patient_med_info';
$route['consultation'] = 'Patient/patient_consult';
$route['forms'] = 'Patient/dynamic_form';
$route['data-review'] = 'Patient/data_analysis';

$route['dashboard-healthworker'] = 'HealthWorker/dashboard';

$route['dashboard-admin'] = 'Administrator/dashboard';
$route['medicineinfo'] = 'Administrator/medicineInformation';
$route['incomingitems'] = 'Administrator/incomingStocks';
$route['outgoingitems'] = 'Administrator/outgoingStocks';
$route['stockstransfer'] = 'Administrator/transferStocks';
$route['physicalcount'] = 'Administrator/physicalCount';
$route['healthcenter'] = 'Administrator/healthcenter';
$route['barangay'] = 'Administrator/barangay';

$route['naturev'] = 'Administrator/naturev';
$route['consultationt'] = 'Administrator/consultationt';
$route['symptoms'] = 'Administrator/symptoms';
$route['examination'] = 'Administrator/examination';
$route['results'] = 'Administrator/results';
$route['physician'] = 'Administrator/physician';
$route['medcategory'] = 'Administrator/generic';
$route['medtype'] = 'Administrator/brand';
$route['uom'] = 'Administrator/uom';

