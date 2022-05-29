<?php

namespace App\Models;

use App\core\Model;

use App\core\Application;

class Users extends Model
{


    public function setTableName()
    {
        return 'Users';
    }

    public static function do()
    {
        return new static;
    }

    //!refactor
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

    //!refactor
    public function getData($where)
    {
        $table = $this->setTableName();
        $column = ['id', 'firstName', 'lastName', 'email'];
        $findBy = ["id" => $where];
        return  Application::$app->Connection->getMedoo()->select($table, $column, $findBy);
    }

    public function visitSearch()
    {
        $sql = "SELECT
	appointment.reason,
	appointment.statuse,
	appointment.pay_a,
	doctor.firstName,
	doctor.lastName,
	clinic_section.`name`,
	worktime.week_days,
	worktime.end_worktime,
	worktime.start_worktime,
	appointment.id 
     FROM
	appointment
	INNER JOIN doctor ON appointment.doctor_id = doctor.id
	INNER JOIN clinic_section ON appointment.clinic_id = clinic_section.id 
	AND doctor.clinic_id = clinic_section.id
	INNER JOIN worktime ON doctor.id = worktime.doctor_id 
	AND appointment.worktime_id = worktime.id 
    ORDER BY
	appointment.id;";
        return Application::$app->Connection->getMedoo()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}
