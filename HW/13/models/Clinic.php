<?php


namespace App\Models;

use App\core\Model;
use App\core\Application;

class Clinic extends Model
{
    public function setTableName()
    {
        return 'clinic_section';
    }

    public static function do()
    {
        return new static;
    }


    public function getData($id)
    {
        $data = $this->select("*", ['id' => $id]);
        return $data;
    }

    public function getAllData()
    {
        $data = $this->select('*');
        return $data;
    }

    public function getAllDataByName($name)
    {
        $data = $this->select('*', ['name' => $name]);
        return $data;
    }
    public function getDataByName($name)
    {
        $data = $this->select('name', ['name' => $name]);
        return $data;
    }
    public function getDataJustName()
    {
        $data = $this->select(['id','name']);
        return $data;
    }



}