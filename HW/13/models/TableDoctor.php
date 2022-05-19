<?php

namespace App\models;

use App\core\Model;

class TableDoctor extends Model
{


    public function setTableName()
    {
        return 'doctor';
    }


     public static function do()
    {
        return new static;
    }
}
