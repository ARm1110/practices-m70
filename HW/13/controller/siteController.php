<?php

namespace App\Controller;

use App\core\Controller;
use App\core\View;
use App\models\Doctor;
use App\models\Users;
use App\core\Request;

class siteController extends Controller
{

    public function index()
    {


        echo $this->render('home');
    }

    public function error404()
    {
        echo $this->render('errors/_404');
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


    public function seeProfile()
    {

        echo $this->render('seeProfile');
    }
    public function appointment()
    {
        $body = Request::getInstance()->getBody();
        
        $where = $body['id'];
        $recordsDoctor =  Doctor::do()->appointments($where);

        
        //todo
        $recordsUser =  Users::do()->getData(1);




        echo $this->render('appointment', ['user' => $recordsUser, 'doctor' => $recordsDoctor]);
    }
}
