<?php

namespace App\Controller;


use App\core\View;

class Controller
{

    public function index()
    {
        (new View)->show('home');
    }

    public function error404()
    {
        (new View)->show('_404');
    }


    public function login()
    {
        (new View)->show('login');
    }


    public function register()
    {
        (new View)->show('register');
    }

    public function passwordForgets()
    {
        (new View)->show('passwordForgets');
    }
 

    
  
}
