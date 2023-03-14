<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;
class Product extends Database {

    public function saveOrUpdate($paramters)
    {
        $productId = $paramters['Product_ID'];
        $result = $this->findByProductId( $productId);
        $countProduct =  mysqli_num_rows ($result);
        if($countProduct ==  1)
        {
            $this->update($paramters);
            $firstRow = $result->fetch_row() ;
            $id = $firstRow[0];
             
            return $id;
        }
        else
        {
            $result =$this->save($paramters);
            $id = $result->insert_id;
            return $id;
        }
   
      
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
        $brandId = $paramters['brand_id'];
        $subCategoryId = $paramters['SubCategory_ID'];
        $description = $paramters["Description"];
        return $this->insert("INSERT INTO products (product_id, name, url,search_keywords,brand_id,nr,category_id,description)
        VALUES ( $productId , '$name','$url' ,' $searchKeywords',$brandId, '$nr',$subCategoryId, '$description')");
    }
    public function update($paramters)
    {
        $productId = $paramters['Product_ID'];
        $name = $paramters['Name'];
        $url = $paramters['Product_URL'];
        $searchKeywords = $paramters['Search_Keywords']; 
        $nr = $paramters['NR'];
        $brandId = $paramters['brand_id'];
        $subCategoryId = $paramters['SubCategory_ID'];
        $description = $paramters["Description"];
        return $this->executeStatement("UPDATE   products SET description='$description', category_id=$subCategoryId , brand_id=$brandId , name='$name' , url = '$url',search_keywords=' $searchKeywords', nr='$nr' WHERE product_id=$productId");
    }

}