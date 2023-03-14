<?php
namespace Hossein\Task1\services;

use Hossein\Task1\repository\InterfaceProduct;
class SaveXmlService implements InterfaceService
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
            $xmlToJsonService = new XmlToJsonService();
            $content =   $xmlToJsonService->action($fileContent);
            $contentArray = json_decode($content,true);
            $products = $contentArray["Product"]??null;
            $this->saveProduct($products);
     
   }
   private function saveProduct( $products)
   {
      foreach($products as $key=> $product)
        {

         
          $productId =    $this->productRepo->saveOrUpdateProduct($product);
  
          foreach($product['Items'] as  $item)
           if(isset($item[0]))
           {
            $this->productRepo->saveOrUpdateItem($item[0],$productId);
           }

   }

}