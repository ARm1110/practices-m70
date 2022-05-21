<?php

namespace App\controller;

use App\core\connection\MedooDatabase;
use App\core\Controller;
use App\core\Application;
use App\core\View;
use App\models\TableDoctor;
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

        $name = $body["search"];

        $SQL = "SELECT doctor.id,doctor.firstName,doctor.statuse,doctor.lastName,clinic_section.name from doctor 
        INNER JOIN clinic_section on doctor.clinic_id = clinic_section.id
        WHERE doctor.firstName LIKE '$name%'
        ;";


        $records = Application::$app->Connection->getMedoo()->exec($SQL)->fetchAll();
        echo  $this->render('DoctorList', ['data' => [$records]]);
    }


    public function filter()
    {
        $body = Request::getInstance()->getBody();

        $name = $body["filter"];

        $SQL = "SELECT doctor.id, doctor.firstName,doctor.statuse,doctor.lastName,clinic_section.name from doctor 
        INNER JOIN clinic_section on doctor.clinic_id = clinic_section.id
        WHERE clinic_section.name LIKE '$name%'
        ;";

        $records = Application::$app->Connection->getMedoo()->exec($SQL)->fetchAll();
        echo  $this->render('DoctorList', ['data' => [$records]]);
    }


    public function showProfile()
    {
        $body = Request::getInstance()->getBody();

      
        $name = $body["id"];

        $SQL = "
        SELECT
	    doctor.id, doctor.firstName, doctor.lastName,
        doctor.statuse, doctor.email, doctor_profile.zip_code,
        doctor_profile.ed_info, doctor_profile.amount_visit,
        doctor_profile.phone_number, clinic_section.`name`, 
        worktime.start_worktime, 	worktime.end_worktime,
        worktime.week_days FROM doctor INNER JOIN 
        doctor_profile ON doctor.profile_id = doctor_profile.id
        INNER JOIN worktime ON doctor.id = worktime.doctor_id INNER JOIN clinic_section ON 
	    doctor.clinic_id = clinic_section.id WHERE ( doctor.id =$name) GROUP BY doctor.id
        ;";
        
        $records = Application::$app->Connection->getMedoo()->exec($SQL)->fetch(\PDO::FETCH_ASSOC);
        echo  $this->render('seeProfile', ['data' => [$records]]);
    }
}
