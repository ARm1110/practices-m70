<?php

namespace App\controller;

use App\core\Controller;
use App\core\View;

class dashboardController extends Controller
{

    public function dashboardDoctor()
    {
        Controller::setLayout('main2');
        echo $this->render('homeDoctor', ["list" => "profileEdited", "list2" => "home"]);
    }

    public function profileEdited()
    {
        Controller::setLayout('main2');
        echo $this->render('profileEdited', ["list" => "profileEdited", "list2" => "home"]);
     
    }


    public function dashboardManagement()
    {
        Controller::setLayout('main2');
        echo $this->render('homeManagement', ["list" => "AcceptList", "list2" => "section"]);
     
    }


    public function AcceptList()
    {
        Controller::setLayout('main2');
        echo $this->render('checkDoctorList', ["list" => "AcceptList", "list2" => "section"]);
      
    }

    public function section()
    {
        Controller::setLayout('main2');
        echo $this->render('Section', ["list" => "AcceptList", "list2" => "section"]);
    }
}
