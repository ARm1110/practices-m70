<?php
use App\controllers\AuthController;

use App\core\Application;
use App\controllers\siteController;

require_once __DIR__ . "/../vendor/autoload.php";


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
'db' => [
'dsn' => $_ENV['DB_DSN'],
'user' => $_ENV['DB_USER'],
'password' => $_ENV['DB_PASSWORD']
]
];
// var_dump($config);
// exit;
$app = new Application();

// $app->router->get('/', function () {
// return 'hello';
// }); //
$app->router->get('/', [siteController::class, 'home']); //


$app->run();