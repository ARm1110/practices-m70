<?php

namespace App\Controller;

use App\core\Controller;
use App\core\View;

class siteController extends Controller
{

    public function index()
    {
        
        
        echo $this->render('home');
    }

    public function error404()
    {
 
        echo $this->render('_404');
    }


    public function login()
    {
        
        echo $this->render('login');
    }


    public function register()
    {
      
        echo $this->render('register');
    }

    public function passwordForgets()
    {
        
        echo $this->render('passwordForgets');
    }
}
