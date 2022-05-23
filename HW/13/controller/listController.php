<?php

namespace App\controller;

use App\core\connection\MedooDatabase;
use App\core\Controller;
use App\core\Application;
use App\core\View;
use App\models\TableDoctor;
use App\models\Doctor;
use App\core\Request;

class listController extends Controller
{

    public function DoctorList()
    {


        $column = array('[><]clinic_section' => array('clinic_id' => 'id'));
        $where = array('doctor.id', 'doctor.firstName', 'doctor.lastName', 'doctor.statuse', 'clinic_section.name');

        $records = Application::$app->Connection->getMedoo()->select('doctor', $column, $where);
        echo  $this->render('DoctorList', ['data' => [$records]]);
    }

    public function searchByName()
    {
        $body = Request::getInstance()->getBody();

        $where = $body["search"];

        $records =  Doctor::do()->search($where);
        echo  $this->render('DoctorList', ['data' => [$records]]);
    }


    public function filter()
    {
        $body = Request::getInstance()->getBody();

        $where= $body["filter"];

      
        $records =  Doctor::do()->filterTable($where);

        echo  $this->render('DoctorList', ['data' => [$records]]);
    }


    public function showProfile()
    {
        $body = Request::getInstance()->getBody();

        $where = $body["id"];

        $records=  Doctor::do()->showTable($where);
        
        echo  $this->render('seeProfile', ['data' => [$records]]);
    }
}
