<?php

namespace App\core;

use App\core\Router;
use App\core\View;
use App\core\Controller;
use App\Controller\siteController;


class Application
{
    public static $ROOT_DIR;
    public Router $router;
    public static Application $app;
    public View $view;
    public Controller $controller;

    public function __construct($path)
    {
        self::$ROOT_DIR = $path;
        self::$app = $this;
        $this->controller = new Controller;
        $this->view = new View;
        
        $this->router = new Router;
    }


    public function get($path, $callback)
    {
        $this->router->get($path, $callback);
    }
    public function post($path, $callback)
    {
        $this->router->post($path, $callback);
    }
    public function run()
    {
        return $this->router->solve();
    }
}
