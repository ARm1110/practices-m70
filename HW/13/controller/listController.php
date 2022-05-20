<?php

namespace App\controller;

use App\core\connection\MedooDatabase;
use App\core\Controller;
use App\core\View;
use App\models\TableDoctor;

class listController extends Controller
{

    public function DoctorList()
    {


        $column = array(

            '[><]clinic_section' => array('doctor_id' => 'clinic_id'),
            array(
                'doctor.doctor_id', 'doctor.user_name', 'doctor.doctor_name', 'clinic_section.clinic_name'
            )
        );

        $records = TableDoctor::do()->select($column);
        var_dump($records);
        exit;
        $this->render('DoctorList', ['data' => [$records]]);
    }
}
