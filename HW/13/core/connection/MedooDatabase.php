<?php

namespace App\core\connection;

use  \Medoo\Medoo;

class MedooDatabase
{

  private static $database;
  private static MedooDatabase $instance;
  private function __construct()
  {
    self::$database = new Medoo([
      'type' => 'mysql',
      'host' => '127.0.0.1',
      'database' => 'hospital',
      'username' => 'root',
      'password' => ''
    ]);
  }

  public static function getMedoDatabase()
  {
    self::$instance = new self;
    return self::$instance::$database;
  }
}
