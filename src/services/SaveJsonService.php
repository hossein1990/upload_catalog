<?php
namespace Hossein\Task1\services;

use Hossein\Task1\repository\InterfaceProduct;
class SaveJsonService implements InterfaceService
{
   private $productRepo;
   public function __construct(InterfaceProduct $productRepo)
   {
       $this->productRepo = $productRepo;
   }
   public  function action($file)
   {
    
      $fileContent =  file_get_contents($file['tmp_name']);
      $content =  $fileContent;
      $contentArray = json_decode($content,true);
      $products = $contentArray;
      return $this->saveProduct($products);
     
   }
   private function saveProduct( $products)
   {
      foreach($products as $key=> $product)
        {

         
          echo   $this->productRepo->saveOrUpdateProduct($product);

            
        }
   }
}