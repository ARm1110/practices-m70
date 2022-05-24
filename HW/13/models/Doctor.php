<?php

namespace App\Models;

use App\core\Model;
use App\core\Application;

class Doctor extends Model
{


    public function setTableName()
    {
        return 'Doctor';
    }

    public static function do()
    {
        return new static;
    }
    public function setRegister(array $body)
    {


        $SQL = [

            "firstName" => "null",
            "lastName" => "null",
            "email" => "null",
            "password" => "null",
            "statuse" => "0"
        ];
        $SQL["firstName"]  = $body['firstName'];
        $SQL["lastName"] = $body['lastName'];
        $SQL["email"] = $body['email'];
        $SQL["password"] = md5($body['password']);

        $this->insert($SQL);
    }

    public function showTable($where)
    {
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
	    doctor.clinic_id = clinic_section.id WHERE ( doctor.id =$where) GROUP BY doctor.id
        ;";
        return  Application::$app->Connection->getMedoo()->exec($SQL)->fetch(\PDO::FETCH_ASSOC);
    }

    public function filterTable($where)
    {
        $SQL = "SELECT doctor.id, doctor.firstName,doctor.statuse,doctor.lastName,clinic_section.name from doctor 
        INNER JOIN clinic_section on doctor.clinic_id = clinic_section.id
        WHERE clinic_section.name LIKE '$where%'
        ;";
        return  Application::$app->Connection->getMedoo()->exec($SQL)->fetchAll();
    }

    public function search($where)
    {
        $SQL = "SELECT doctor.id,doctor.firstName,doctor.statuse,doctor.lastName,clinic_section.name from doctor 
        INNER JOIN clinic_section on doctor.clinic_id = clinic_section.id
        WHERE doctor.firstName LIKE '$where%'
        ;";
        return  Application::$app->Connection->getMedoo()->exec($SQL)->fetchAll();
    }

    public function appointments($where)
    {
        $SQL = "SELECT
	doctor.id, 
	worktime.start_worktime, 
	worktime.week_days, 
	worktime.end_worktime, 
    worktime.id as worktID , 
	clinic_section.`name` as clinicName,
    clinic_section.`id` as clinicID
    FROM
	doctor
	INNER JOIN
	doctor_profile
	ON 
		doctor.profile_id = doctor_profile.id
	INNER JOIN
	worktime
	ON 
		doctor.id = worktime.doctor_id
	INNER JOIN
	clinic_section
	ON 
		doctor.clinic_id = clinic_section.id
    WHERE
	doctor.id = $where
    GROUP BY
	doctor.id,worktime.id";



        return  Application::$app->Connection->getMedoo()->exec($SQL)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
