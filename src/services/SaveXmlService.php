<?php
namespace Hossein\Task1\services;

class SaveXmlService implements InterfaceService
{
   
   public  function action($file)
   {
      $fileContent =  file_get_contents($file['tmp_name']);
      $xmlToJsonService = new XmlToJsonService();
      $content =   $xmlToJsonService->action($fileContent);
      $contentArray = json_decode($content,true);
      $products = $contentArray["Product"];
      return $this->saveProduct($products);
   }
   private function saveProduct( $products)
   {
      foreach($products as $key=> $product)
        {  
             
        }
   }
}