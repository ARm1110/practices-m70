<?php

namespace App\Models;

use App\core\Model;

class Management extends Model
{


    public function setTableName()
    {
        return 'Management';
    }

    public static function do()
    {
        return new static;
    }
}
