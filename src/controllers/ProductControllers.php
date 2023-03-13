<?php
namespace Hossein\Task1\controllers;
use Hossein\Task1\requests\uploadRequest;
use Hossein\Task1\services\XmlToJsonService;
class ProductControllers 
{
    public static function uploadCatalog($file)
    {
        $uploadRequest = new uploadRequest;
        $validations = $uploadRequest->validation();
        if(!is_null($validations))
            return $validations;
        return  $fileContent;
    }
}