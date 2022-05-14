<?php

use App\core\Application;
use App\controller\Controller;
use App\controller\TodoController;
use App\controller\authController\AuthController;


require_once __DIR__.'/vendor/autoload.php';


$app = new Application;

$app->get('/',[Controller::class, 'index']);

$app->get('/_404', [Controller::class, 'error404']);



$app->get('/login', [Controller::class, 'login']);


$app->get('/register', [Controller::class, 'register']);


$app->get('/passwordForgets', [Controller::class, 'passwordForgets']);















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
