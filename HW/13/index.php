<?php

use App\core\Application;
use App\controller\dashboardController;

use App\controller\controller;
use App\controller\listController;
use App\controller\siteController;

use App\controller\TodoController;
use App\controller\authController\AuthController;


require_once __DIR__ . '/vendor/autoload.php';


$app = new Application(__DIR__);


// $app->get('/',[siteController::class, 'index']);
//!home
$app->get('/home', [siteController::class, 'index']);
$app->get('/DoctorList', [listController::class, 'DoctorList']);
$app->post('/DoctorList/Search', [listController::class, 'searchByName']);
$app->get('/DoctorList/seeProfile', [siteController::class, 'seeProfile']);
$app->post('/DoctorList/seeProfile', [siteController::class, 'seeProfile']);
$app->post('/DoctorList/Filter', [listController::class, 'filter']);
$app->post('/DoctorList/Profile', [listController::class, 'showProfile']);




//!errorPage
$app->get('/_404', [siteController::class, 'error404']);


//!login
$app->get('/login', [siteController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);

//!register
$app->get('/register', [siteController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);

//!forgetPassword
$app->get('/passwordForgets', [siteController::class, 'passwordForgets']);


//!sitDoctor
$app->get('/dashboardDoctor', [dashboardController::class, 'dashboardDoctor']);
$app->get('/profileEdited', [dashboardController::class, 'profileEdited']);

//!siteManagement
$app->get('/dashboardManagement', [dashboardController::class, 'dashboardManagement']);
$app->get('/AcceptList', [dashboardController::class, 'AcceptList']);
$app->get('/section', [dashboardController::class, 'section']);


















$app->run();
