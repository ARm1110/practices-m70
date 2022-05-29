<?php

namespace App\core\connection;

use  \Medoo\Medoo;

class MedooDatabase
{

  public  $database;

  public function __construct($config)
  {
    try {
      $this->database = new Medoo([
        'type' => $config['type'],
        'host' => $config['host'],
        'database' => $config['database'],
        'username' => $config['username'],
        'password' => $config['password'],
        'charset' => 'utf8'
      ]);
    } catch (\Exception $e) {
      throw $e;
    }
  }

  public  function getMedoo()
  {
    return $this->database;
  }
}
