<?php

namespace App\core;

use \App\core\connection\MedooDatabase;


abstract class Model
{
    

    public  static $medooDatabase;
    public $tableName;

    public function __construct()
    {

        self::$medooDatabase = Application::$app->Connection->getMedoo();

        $this->tableName = $this->setTableName();
    }


    public abstract function setTableName();

    public static function do()
    {
        return new static;
    }
    public function select($columns, $where=null)
    {

        return self::$medooDatabase->select($this->tableName, $columns, $where);
    }
    // public function find()
    // {
    // }
    public function insert($column)
    {
        self::$medooDatabase->insert($this->tableName,$column);
    }

    public function delete()
    {
    }
    public function where()
    {
        
    }
    public function get()
    {
    }
    public function update($data, $where = null)
    {
        self::$medooDatabase->update($this->tableName, $data, $where = null);
    }
}
