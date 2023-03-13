<?php
namespace Hossein\Task1\controllers;
use Hossein\Task1\requests\uploadRequest;
use Hossein\Task1\services\XmlToJsonService;
use Hossein\Task1\services\ProductSaveService;
use Hossein\Task1\repository\InterfaceProduct;
class ProductControllers 
{
    public function __construct(InterfaceProduct $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public  function uploadCatalog($file)
    {
        $uploadRequest = new uploadRequest;
        $validations = $uploadRequest->validation();
        if(!is_null($validations))
            return $validations;
        $productSerivce = new ProductSaveService($this->productRepo);
        return  $productSerivce->action($file);
    }
}