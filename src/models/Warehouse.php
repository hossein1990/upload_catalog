<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Warehouse extends Database {

    public function saveOrUpdate($paramters)
    {
        $name = $paramters["name"];
        $result = $this->findByName( $name);
        $countWarehouse = mysqli_num_rows ($result);
        if($countWarehouse ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $warehouseId = $firstRow[0];
            return $warehouseId;
        }
        $result =$this->save($name);
        $warehouseId = $result->insert_id;
        return $warehouseId;
    }
    public function findByName( $name)
    {
      return   $this->executeStatement("select id from warehouses where name='$name' ");
    }
    public function save($name)
    {
   
        return $this->insert("INSERT INTO warehouses (name)
        VALUES ( '$name')");
    }

}