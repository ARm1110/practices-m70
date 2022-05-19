<?php

namespace App\Controller\AuthController;

use App\core\Application;
use App\core\Request;
use App\core\View;
use App\core\connection\MedooDatabase;
use App\models\TableDoctor;

class AuthController
{

    public function register()
    {

        $body = Request::getInstance()->getBody();
        var_dump($body);
        exit;
    }






    public function login()
    {
        $body = Request::getInstance()->getBody();
        var_dump($body);
        exit;
    }
}
