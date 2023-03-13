<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Brand extends Database {

    public function saveOrUpdate($name)
    {
        $result = $this->findByName( $name);
        $countProduct = mysqli_num_rows ($result);
        if($countProduct ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $brandId = $firstRow[0];
            return $brandId;
        }
        $result =$this->save($name);
        $brandId = $result->insert_id;
        return $brandId;
    }
    public function findByName( $name)
    {
      return   $this->executeStatement("select id from brands where name='$name' ");
    }
    public function save($name)
    {
   
        return $this->insert("INSERT INTO brands (name)
        VALUES ( '$name')");
    }

}