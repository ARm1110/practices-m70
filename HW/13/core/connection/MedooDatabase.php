<?php

namespace App\core\connection;

use  \Medoo\Medoo;

class MedooDatabase
{

  public  $database;
  
  public function __construct()
  {
    $this->database = new Medoo([
      'type' => 'mysql',
      'host' => '127.0.0.1',
      'database' => 'hospital',
      'username' => 'root',
      'password' => ''
    ]);
  }

  public  function getMedoo()
  {
    return $this->database;
  }
}
