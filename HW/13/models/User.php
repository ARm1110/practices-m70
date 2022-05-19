<?php

namespace App\Models;

use App\core\Model;

class User extends Model
{
    

    public function setTableName ()
    {
        return 'employee'; 
    }

}
