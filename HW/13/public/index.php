<?php

use App\controllers\AuthController;

use App\core\Application;
use App\controllers\siteController;

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
// var_dump($config);
// exit;
$app = new Application(dirname(__DIR__ . '/mvc7.com/'), $config);

// $app->router->get('/', function () {
// return 'hello';
// }); //
$app->router->get('/', [siteController::class, 'home']); //


$app->run();
