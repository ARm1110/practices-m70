<?php

namespace App\core;

use \App\core\connection\MedooDatabase;


abstract class Model
{
    // protected $table;

    public  static $medooDatabase;
    public $tableName;

    public function __construct()
    {

        self::$medooDatabase = MedooDatabase::getMedoDatabase();

        $this->tableName = $this->setTableName();
    }


    public abstract function setTableName();

    public static function do()
    {
        return new static;
    }
    public function select($columns, $where)
    {

        return self::$medooDatabase->select($this->tableName, $columns, $where);
    }
    public function find()
    {
    }
    public function insert()
    {
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
    public function update()
    {
    }
}
