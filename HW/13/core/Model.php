<?php

namespace App\core;

use App\core\MedooDatabase;

abstract class Model 
{
    // protected $table;
   
    // public  $DbMedoo;
    // public $TableName;

    // public function __construct()
    // {

    //     $this->DbMedoo = Application::connect();

    //     $this->TableName =$this->setTableName();
    // }
    // public abstract function setTableName();

    // public static function model()
    // {
    //     return new static;
    // }
    // public function selectAll($table, $column)
    // {
    //     return $this->DbMedoo->select($table, $column);
    //     // return $this->statement->select()->fetchAll();
    // }
    // public function find(string $value, string $col = 'employee_id')
    // {
    //     return $this->statement->select()->where($value, $col)->fetch();
    // }
    // public function insert(array $data)
    // {
    //     return $this->statement->insert($data)->exec();
    // }

    // // public function delete(string $col, $value)
    // // {
    // //     return $this->statement->delete($col, $value);
    // // }
    // public function where($oprand1, $oprand2, $operation = '='): self // self ????
    // {
    //     $this->statement->where($oprand1, $oprand2, $operation);
    //     return $this;
    // }
    // // public function get()
    // // {
    // //     return $this->statement->select()->where();
    // // }
    // public function update(array $data)
    // {
    //     return $this->statement->update($data)->exec();
    // }
}
