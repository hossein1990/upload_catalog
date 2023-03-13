<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Category extends Database {

    public function saveOrUpdate($name)
    {
        $result = $this->findByName( $name);
        $countProduct = mysqli_num_rows ($result);
        if($countProduct ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $categoryId = $firstRow[0];
            return $categoryId;
        }
        $result =$this->save($name);
        $categoryId = $result->insert_id;
        return $categoryId;
    }
    public function findByName( $name)
    {
      return   $this->executeStatement("select id from categories where name='$name' ");
    }
    public function save($name)
    {
   
        return $this->insert("INSERT INTO categories (name)
        VALUES ( '$name')");
    }

}