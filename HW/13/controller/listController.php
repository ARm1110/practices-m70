<?php

namespace App\controller;

use App\core\connection\MedooDatabase;
use App\core\View;

use App\models\TableDoctor;

class listController
{

    public function DoctorList()
    {


        $column = array(

            '[><]clinic_section' => array('doctor_id' => 'clinic_id'),
            '[><]work_time' => array('doctor_id' => 'day_id')

        );


        $where = array(
            'doctor.doctor_id', 'doctor.doctor_name', 'clinic_section.clinic_name', 'week_day_name',
            'GROUP' => [
                'week_day_name'

            ]

            // "AND" => [
            //     "user_name[!]" => "foo",
            //     "user_id[!]" => 1024,
            //     "email[!]" => ["foo@bar.com", "cat@dog.com", "admin@medoo.in"],
            //     "city[!]" => null,
            //     "promoted[!]" => true
            // ]

        );
        // $data = MedooDatabase::getMedoDatabase()->select('doctor', array('[><]clinic_section' => array('doctor_id' => 'clinic_id')), array('doctor.doctor_name', 'clinic_section.clinic_name'));
        $records = TableDoctor::do()->select($column, $where);
        var_dump($records);
        exit;
        (new View)->show('DoctorList', ['data' => [$records]]);
    }
}
