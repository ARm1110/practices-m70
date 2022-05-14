<?php

namespace App\Controller;


use App\core\DB\MedooDatabase;
use App\core\View;


class Controller
{

    public function login()
    {


        (new View)->show('login');
    }
    public function register()
    {


        (new View)->show('register');
    }
}
