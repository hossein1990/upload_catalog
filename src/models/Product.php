<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;
class Product extends Database {

    public function saveOrUpdate($paramters)
    {
        $productId = $paramters['Product_ID'];
        $result = $this->findByProductId( $productId);
        $countProduct =  $result->field_count;
        if($countProduct ==  1)
           $this->update($paramters);
        else
          $this->save($paramters);
      
    }
    public function findByProductId( $productId)
    {
      return   $this->executeStatement("select id from products where product_id=$productId ");
    }
    public function save($paramters)
    {
        $productId = $paramters['Product_ID'];
        $name = $paramters['Name'];
        $url = $paramters['Product_URL'];
        $searchKeywords = $paramters['Search_Keywords']; 
        $nr = $paramters['NR'];

        return $this->executeStatement("INSERT INTO products (product_id, name, url,search_keywords,brand_id,nr)
        VALUES ( $productId , '$name','$url' ,' $searchKeywords',1, '$nr')");
    }
    public function update($paramters)
    {
        $productId = $paramters['Product_ID'];
        $name = $paramters['Name'];
        $url = $paramters['Product_URL'];
        $searchKeywords = $paramters['Search_Keywords']; 
        $nr = $paramters['NR'];
        return $this->executeStatement("UPDATE   products SET name='$name' , url = '$url',search_keywords=' $searchKeywords', nr='$nr' WHERE product_id=$productId");
    }

}