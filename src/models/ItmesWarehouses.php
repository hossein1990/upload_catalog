<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class ItmesWarehouses extends Database {

    public function saveOrUpdate($paramters)
    {
        $result = $this->findByName( $paramters);
        $countItmesWarehouses = mysqli_num_rows ($result);
        if($countItmesWarehouses ==  1)
        {
            $this->update($paramters);
        }    
        else
        {
            $result =$this->save($paramters);
        }
        
    }
    public function findByName( $paramters)
    {
        $warehouseId = $paramters["warehouse_id"];
        $itemId = $paramters["item_id"];
      return   $this->executeStatement("select id from itmes_warehouses where warehouses_id='$warehouseId' and items_id ='$itemId'");
    }
    public function save($paramters)
    {
        $warehouseId = $paramters["warehouse_id"];
        $itemId = $paramters["item_id"];
        $inventoryCount = $paramters["inventory_count"];
        return $this->insert("INSERT INTO itmes_warehouses (warehouses_id,items_id,inventory_count)
        VALUES ($warehouseId, $itemId,$inventoryCount)");
    }
    public function update($paramters)
    {
        $warehouseId = $paramters["warehouse_id"];
        $itemId = $paramters["item_id"];
        $inventoryCount = $paramters["inventory_count"];
        $this->rest( $itemId);
        return $this->executeStatement("UPDATE   itmes_warehouses SET inventory_count= $inventoryCount WHERE warehouses_id=$warehouseId and items_id =$itemId");
    }
    private function rest( $itemId)
    {

        return $this->executeStatement("UPDATE   itmes_warehouses SET inventory_count= 0 WHERE  items_id =$itemId");
    }

}