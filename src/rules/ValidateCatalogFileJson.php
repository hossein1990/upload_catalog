<?php
namespace Hossein\Task1\rules;

class ValidateCatalogFileJson 
{
    private $validations=array();
    public function rule($file)
     {
        $fileContent =  file_get_contents($file['tmp_name']);
        $currentType=$file['type'];
        $content =  $fileContent;
        $contentArray = json_decode($content,true);
        $products = $contentArray;
        $this->validationProduct($products);
        return count($this->validations)>0?$this->validations:null;
     }
     private function validationProduct($products)
     {
        foreach($products as $key=> $product)
        {
            
            if(!isset($product["Product_ID"]))
              $this->validations["Product_ID_".$key] =  "Product_ID is required";
            if(!isset($product["NR"]))
              $this->validations["NR_".$key] = "NR is required";
            if(!isset($product["Name"]))
              $this->validations["Name_".$key] = "Name is required";
            if(isset($product['Items']))
              foreach($product['Items'] as  $keyItem=> $item)
                $this->validateItem($item,$key,$keyItem);
        }

     }
     private function validateItem($item,$key,$keyItem)
     {
        $validationItems = array();
        if(!isset($item['SKU']))
          $this->validations["product_".$key]["SKU_".$keyItem] = "SKU Item is required";
        if(!isset($item['Price']))
          $this->validations["Price_".$key]["Price_".$keyItem] = "Price Item is required";
        if(!isset($item['Retail_Price']))
          $this->validations["Retail_Price_".$key]["Retail_Price".$keyItem] = "Price Item is required";
       
     }
}