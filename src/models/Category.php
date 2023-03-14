<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;

class Category extends Database {

    public function saveOrUpdate($parameter)
    {
        $categoryId = $parameter["id"];
        $result = $this->findByName( $categoryId);
        $countCategory = mysqli_num_rows ($result);
        if($countCategory ==  1)
        {
            $firstRow = $result->fetch_row() ;
            $categoryId = $firstRow[0];
            return $categoryId;
        }
        $result =$this->save($parameter);
        $categoryId = $result->insert_id;
        return $categoryId;
    }
    public function findByName( $id)
    {
      return   $this->executeStatement("select id from categories where id='$id' ");
    }
    public function save($parameter)
    {
        $name = $parameter['name'];
        $parentId = $parameter['parent_id']??0;
        $id = $parameter['id'];
        return $this->insert("INSERT INTO categories (name,id,parent_id)
        VALUES ( '$name',$id ,$parentId)");
    }
    public function update($paramters)
    {
        $name = $parameter['name'];
        $parentId = $parameter['parent_id']??0;
        $id = $parameter['id'];
        return $this->executeStatement("UPDATE   categories SET  name='$name',parent_id=$parentId WHERE id=$id");
    }
}