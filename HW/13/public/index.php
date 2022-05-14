<?php

use App\controllers\AuthController;

use App\core\Application;


require_once __DIR__ . "/../vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'db' => [
        'host' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'databaseName' => $_ENV['DB_NAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__ . '/mvc7.com/'), $config);


$app->router->get('/', [homeController::class, 'home']); 

$app->router->get('/login', [AuthController::class, 'login']); 
$app->router->get('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']); 



$app->run();
