<?php

namespace App\Controller;


use App\core\DB\MedooDatabase;
use App\core\View;


class Controller
{

    public function home()
    {

        
        (new View)->show('home');
    }
}
