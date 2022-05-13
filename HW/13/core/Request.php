<?php

namespace App\core;

class Request
{
    private static $instance = null;


    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Request();
        }

        return self::$instance;
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
     
        return strtok($path,'?');
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
