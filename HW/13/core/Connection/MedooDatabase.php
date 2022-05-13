<?php

namespace App\core\Connection;


use  \Medoo\Medoo;

class MedooDatabase
{

    private static $database;
    private static MedooDatabase $instance;
    private function __construct(array $config)
    {
        self::$database = new Medoo([
            'type' => 'mysql',
            'host' => $config['host'],
            'database' => $config['databaseName'],
            'username' => $config['user'],
            'password' => $config['password']
        ]);
    }

    public static function getInstances(array $config)
    {
        if (self::$instance == null) {
            self::$instance = new MedooDatabase($config);
        }

        return self::$instance;
    }
    public function getConnections()
    {
        return $this->database;
    }
  
}
