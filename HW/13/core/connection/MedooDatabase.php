<?php

namespace App\core\connection;

use  \Medoo\Medoo;

class MedooDatabase
{

  public  $database;

  public function __construct($config)
  {

    $this->database = new Medoo([
      'type' => $config['type'],
      'host' => $config['host'],
      'database' => $config['database'],
      'username' => $config['username'],
      'password' => $config['password'],
      'charset' => 'utf8'
    ]);
  }

  public  function getMedoo()
  {
    return $this->database;
  }
}
