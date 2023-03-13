<?php
namespace Hossein\Task1\services;

class ProductSaveService   implements InterfaceService
{
   public  function action($file)
   {
      $currentType=$file['type']; 
      if($currentType === "application/xml")
         $saveService =  new SaveXmlService();
      else
         $saveService = new SaveJsonService();
      return $saveService->action($file);
    
   }
}