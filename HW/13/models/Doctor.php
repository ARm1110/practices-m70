<?php

namespace App\Models;

use App\core\Model;

class Doctor extends Model
{
    

    public function setTableName ()
    {
        return 'Doctor'; 
    }

    public static function do()
    {
        return new static;
    }

}
