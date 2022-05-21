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
    public function setRegister($table, array $body)
    {
        // var_dump($data);
        // exit;

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

        // var_dump($SQL);
        // exit;
        Application::$app->Connection->getMedoo()->insert($table, $SQL);
    }
}
