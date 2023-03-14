<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Size extends Database {

    public function saveOrUpdate($name)
    {
        $result = $this->findByName( $name);
        $countSize = mysqli_num_rows ($result);
        if($countSize ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $sizeId = $firstRow[0];
            return $sizeId;
        }
        $result =$this->save($name);
        $sizeId = $result->insert_id;
        return $sizeId;
    }
    public function findByName( $name)
    {
      return   $this->executeStatement("select id from sizes where name='$name' ");
    }
    public function save($name)
    {
   
        return $this->insert("INSERT INTO sizes (name)
        VALUES ( '$name')");
    }

}