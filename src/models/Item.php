<?php
namespace Hossein\Task1\models;

use Hossein\Task1\inc\Database;
class Item extends Database {

    public function saveOrUpdate($paramters)
    {
        $sku = $paramters['SKU'];
        $result = $this->findByItemSku( $sku);
        $countItem =  mysqli_num_rows ($result);
        echo $countItem."===$sku";
        if($countItem ==  1)
        {
            echo "hossein";
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
    public function findByItemSku( $sku)
    {
      return   $this->executeStatement("select id from items where sku='$sku' ");
    }
    public function save($paramters)
    {
        $sku = $paramters['SKU'];
        $price = $paramters['Price'];
        $retailPrice = $paramters['Retail_Price'];
        $thumbnailUrl = $paramters['Thumbnail_URL']; 
        $occassion = json_encode($paramters['Occassion']) ;
        $season = json_encode($paramters['Season']);
        $ratingAvg = $paramters['Rating_Avg'];
        $ratingCount = $paramters["Rating_Count"];
        $active = $paramters["Active"]??0;
        $productId = $paramters["product_id"];
        $colorId = $paramters['color_id'];
        $colorFamilyId = $paramters["color_family_id"];
        return $this->insert("INSERT INTO items (product_id, sku, price,retail_price,thumbnail_url,rating_avg,rating_count,active,occassion,color_id,color_family_id)
        VALUES ( $productId , '$sku',$price ,$retailPrice,'$thumbnailUrl', $ratingAvg,$ratingCount, $active,'$occassion',$colorId,$colorFamilyId)");
    }
    public function update($paramters)
    {
        $sku = $paramters['SKU'];
        $price = $paramters['Price'];
        $retailPrice = $paramters['Retail_Price'];
        $thumbnailUrl = $paramters['Thumbnail_URL']; 
        $occassion = json_encode($paramters['Occassion']) ;
        $season = json_encode($paramters['Season']);
        $ratingAvg = $paramters['Rating_Avg'];
        $ratingCount = $paramters["Rating_Count"];
        $colorId = $paramters['color_id'];
        $colorFamilyId = $paramters["color_family_id"];
        $active = $paramters["Active"]??0;
        $productId = $paramters["product_id"];
        return $this->executeStatement("UPDATE   items SET color_id=$colorId,color_family_id=$colorFamilyId, product_id=$productId,season='$season',occassion='$occassion', sku='$sku' , price='$price' , retail_price='$retailPrice' , thumbnail_url = '$thumbnailUrl',rating_avg='$ratingAvg', rating_count='$ratingCount' WHERE sku='$sku'");
    }

}