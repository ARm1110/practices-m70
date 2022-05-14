<?php

namespace App\core;

use App\core\Router;

use App\Controller\Controller;

class Application
{

    public Router $router;
    public Controller $controller;

    public function __construct()
    {
        $this->controller = new Controller;
        $this->router = new Router;
        
    }
 

    public function get($path, $callback)
    {
        $this->router->get($path,$callback);
    }
    public function post($path, $callback)
    {
        $this->router->post($path,$callback);
    }
    public function run()
    {
        return $this->router->solve();
    }

  
}
