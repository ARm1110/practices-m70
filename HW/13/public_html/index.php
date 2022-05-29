<?php


use App\core\Application;
use App\controller\dashboardController;

use App\controller\controller;
use App\controller\listController;
use App\controller\siteController;

use App\controller\TodoController;
use App\controller\authController\AuthController;
use App\controller\doctorController;
use App\controller\managementController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'type' =>  $_ENV['DB_TYPE'],
        'host' =>  $_ENV['DB_HOST'],
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
    'email'=>[
        'host'=>$_ENV['EMAIL_HOST'],
        'port'=>$_ENV['EMAIL_PORT'],
        'username'=>$_ENV['EMAIL_USERNAME'],
        'password'=>$_ENV['EMAIL_PASSWORD'],
        'encryption'=>$_ENV['EMAIL_ENCRYPTION'],
    ]
];

$app = new Application(dirname(__DIR__), $config);



//!home
$app->get('/', [siteController::class, 'index']);
$app->get('/home', [siteController::class, 'index']);
$app->get('/DoctorList', [listController::class, 'DoctorList']);
$app->post('/DoctorList/Search', [listController::class, 'searchByName']);
$app->get('/DoctorList/seeProfile', [siteController::class, 'seeProfile']);
$app->post('/DoctorList/seeProfile', [siteController::class, 'seeProfile']);
$app->post('/DoctorList/Filter', [listController::class, 'filter']);
$app->post('/DoctorList/Profile', [listController::class, 'showProfile']);
$app->get('/DoctorList/Profile/appointment', [siteController::class, 'appointment']);



//!admin
$app->get('/admin', [siteController::class, 'admin']);



//!errorPage
$app->get('/_404', [siteController::class, 'error404']);


//!login
$app->get('/login', [siteController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);

//!register
$app->get('/register', [siteController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);

//!logout
$app->get('/logout', [AuthController::class, 'logout']);


//!forgetPassword
$app->get('/passwordForgets', [siteController::class, 'passwordForgets']);
$app->post('/passwordForgets', [AuthController::class, 'passwordForgets']);


//!resetPassword
$app->get('/reset-pass', [siteController::class, 'resetPass']);
$app->post('/reset-pass', [AuthController::class, 'resetPass']);


//!sitDoctor
$app->get('/Dashboard/Doctor', [dashboardController::class, 'dashboardDoctor']);
$app->get('/Profile/Edit', [dashboardController::class, 'profileEdited']);
$app->post('/Profile/Edit', [doctorController::class, 'profileEdited']);
$app->post('/dashboard/doctor/add-time', [doctorController::class, 'addTime']);
$app->get('/dashboard-doctor/delete-work-day', [doctorController::class, 'deleteWorkDay']);
$app->post('/dashboard/doctor/change-clinic-section', [doctorController::class, 'changedClinicSection']);

//!siteManagement
$app->get('/Dashboard/Management', [dashboardController::class, 'dashboardManagement']);
$app->get('/list/Accept', [dashboardController::class, 'AcceptList']);
$app->get('/add/section', [dashboardController::class, 'section']);
$app->get('/management/user-enable', [managementController::class, 'userActive']);
$app->get('/management/user-disable', [managementController::class, 'userDisable']);
















$app->run();
