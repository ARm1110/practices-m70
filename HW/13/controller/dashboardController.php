<?php

namespace App\controller;

use App\core\Application;
use App\core\Controller;
use App\core\Request;

class dashboardController extends Controller
{

    public function dashboardDoctor()
    {
     
        Application::$app->checkAccess->check('id','doctor');


        Controller::setLayout('main2');
        echo $this->render('Doctor/homeDoctor', ["navbar" => ["link1" => '/Profile/Edit', 'viw1' => "Panel Profile", "link2" => '/home', 'viw2' => "Home page"]]);
    }

    public function profileEdited()
    {
        Application::$app->checkAccess->check('id', 'doctor');
        Controller::setLayout('main2');
        echo $this->render('Doctor/profileEdited', ["navbar" => ["link1" => '/Profile/Edit', 'viw1' => "Panel Profile", "link2" => '/home', 'viw2' => "Home page"]]);
    }


    public function dashboardManagement()
    {
        Application::$app->checkAccess->check('id', 'management');
        Controller::setLayout('main2');
        echo $this->render('management/homeManagement', ["navbar" => ["link1" => '/list/Accept', 'viw1' => "Panel Profile", "link2" => '/add/section', 'viw2' => "section"]]);
    }


    public function AcceptList()
    {
        Application::$app->checkAccess->check('id', 'management');
        Controller::setLayout('main2');
        echo $this->render('management/checkDoctorList', ["navbar" => ["link1" => '/list/Accept', 'viw1' => "Panel Profile", "link2" => '/add/section', 'viw2' => "section"]]);
    }

    public function section()
    {
        Application::$app->checkAccess->check('id', 'management');
        Controller::setLayout('main2');
        echo $this->render('management/Section', ["navbar" => ["link1" => '/list/Accept', 'viw1' => "Panel Profile", "link2" => '/add/section', 'viw2' => "section"]]);
    }
}
