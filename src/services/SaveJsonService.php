<?php
namespace Hossein\Task1\services;

class SaveJsonService implements InterfaceService
{
   public  function action($file)
   {
    
      $fileContent =  file_get_contents($file['tmp_name']);
      $content =  $fileContent;
      $contentArray = json_decode($content,true);
      $products = $contentArray;
      return $products;
   }
}