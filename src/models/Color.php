<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Color extends Database {

    public function saveOrUpdate($name)
    {
        $result = $this->findByName( $name);
        $countColor = mysqli_num_rows ($result);
        if($countColor ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $colorId = $firstRow[0];
            return $colorId;
        }
        $result =$this->save($name);
        $colorId = $result->insert_id;
        return $colorId;
    }
    public function findByName( $name)
    {
      return   $this->executeStatement("select id from colors where name='$name' ");
    }
    public function save($name)
    {
   
        return $this->insert("INSERT INTO colors (name)
        VALUES ( '$name')");
    }

}