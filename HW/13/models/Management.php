<?php

namespace App\Models;

use App\core\Application;
use App\core\Model;

class Management extends Model
{


    public function setTableName()
    {
        return 'management';
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


   
}
