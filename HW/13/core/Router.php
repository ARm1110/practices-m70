<?php

namespace App\core;


class Router
{
    private array $routes = [];

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function solve()
    {
        $path = Request::getInstance()->getPath();
        $request = Request::getInstance()->method();
        $routes = $this->routes;
        $callback = $routes[$request][$path];


        if (!$callback) {
           Response::getInstance()->setStatusCode(404);
           
        }

        if (is_array($callback)) {
            $callback[0] =  new $callback[0];
        }

        return call_user_func($callback);
    }
}
