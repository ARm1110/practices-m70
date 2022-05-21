<?php

namespace App\core;

use App\core\Application;

class Controller
{

    public static $layout = 'main';

    public static function setLayout($layout)
    {
        self::$layout = $layout;
        
    }


    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }
}
