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
        $path = ($_SERVER['REQUEST_URI']);
        $pos = strpos($path, '?');
        if ($pos !== false) {
            $path = substr($path, 0, $pos);
        }
        return $path;
    }
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function getBody()
    {
        $body = [];
        if($this->method() == 'get'){
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->method() == 'post'){
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}

