<?php

namespace App\core;

use App\core\Application;

class Controller
{

   
   

  

    public function render($view,$layout=null, $params = [])
    {

        return Application::$app->view->setLayout($layout)->renderView($view, $params);
    }
}
