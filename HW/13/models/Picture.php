<?php

namespace App\core;

class Picture extends Model
{
    var $product_id;
    var $filename;
    var $description;

    //todo
    public function setTableName()
    {
        return 'Picture';
    }

    public static function do()
    {
        return new static;
    }
    public function getForProduct($product_id)
    {
        $SQL = 'SELECT * FROM Picture where product_id = :product_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $product_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $SQL = 'INSERT INTO Picture(product_id,filename,description) VALUE(:product_id,:filename,:description)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['product_id' => $this->product_id, 'filename' => $this->filename, 'description' => $this->description]);
        return $stmt->rowCount();
    }

    public function find($picture_id)
    {
        $SQL = 'SELECT * FROM Picture WHERE picture_id = :picture_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['picture_id' => $picture_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Picture SET filename = :filename,description = :description WHERE picture_id = :picture_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['filename' => $this->filename, 'description' => $this->description, 'picture_id' => $this->picture_id]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM Picture WHERE picture_id = :picture_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['picture_id' => $this->picture_id]);
        return $stmt->rowCount();
    }


}
