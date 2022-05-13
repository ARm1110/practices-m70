<?php

namespace App\core;

use App\core\Router;
use App\core\Connection\MedooDatabase;



class Application
{

    private Router $router;

    public  $db;
    public function __construct($config)
    {

        $this->router = new Router;
        $this->db = MedooDatabase::getInstances($config['db'])->getConnections();
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

    public static function connect()
    {
        return self::$db;
    }
    public static function redirect($path, $callback)
    {
        self::get($path, $callback);
        self::run();
    }
}
