<?php

use App\core\Application;
use App\controller\dashboardController;

use App\controller\controller;
use App\controller\listController;
use App\controller\siteController;

use App\controller\TodoController;
use App\controller\authController\AuthController;


require_once __DIR__.'/vendor/autoload.php';


$app = new Application(__DIR__);

// $app->get('/',[siteController::class, 'index']);

$app->get('/home', [siteController::class, 'index']);


$app->get('/_404', [siteController::class, 'error404']);


//!login
$app->get('/login', [siteController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);

//!register
$app->get('/register', [siteController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);



$app->get('/passwordForgets', [siteController::class, 'passwordForgets']);



$app->get('/dashboardDoctor', [dashboardController::class, 'dashboardDoctor']);

$app->get('/profileEdited', [dashboardController::class, 'profileEdited']);

$app->get('/dashboardManagement', [dashboardController::class, 'dashboardManagement']);


$app->get('/DoctorList', [listController::class, 'DoctorList']);



$app->get('/AcceptList', [dashboardController::class, 'AcceptList']);




$app->get('/section', [dashboardController::class, 'section']);









// $app->get('/todo',[TodoController::class, 'getTodo']);
// $app->post('/todo',[TodoController::class, 'postTodo']);
// // $app->get('/taskPage',[TodoController::class, 'taskPage']);//
// $app->get('/taskPage',[TodoController::class, 'taskPage']);//
// $app->get('/taskDelete',[TodoController::class, 'taskDelete']);//
// $app->get('/taskEdit',[TodoController::class, 'taskEdit']);//
// $app->post('/taskEdit',[TodoController::class, 'taskUpdate']);//
// $app->get('/login',[AuthController::class, 'login']);
// $app->get('/register',[AuthController::class, 'register']);



$app->run();
