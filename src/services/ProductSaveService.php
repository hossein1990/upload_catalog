<?php
namespace Hossein\Task1\services;

use Hossein\Task1\repository\InterfaceProduct;
class ProductSaveService   implements InterfaceService
{
   private $productRepo;
   public function __construct(InterfaceProduct $productRepo)
   {
       $this->productRepo = $productRepo;
   }
   public  function action($file)
   {
      $currentType=$file['type']; 
      if($currentType === "application/xml")
         $saveService =  new SaveXmlService( $this->productRepo);
      else
         $saveService = new SaveJsonService( $this->productRepo);
      return $saveService->action($file);
    
   }
}