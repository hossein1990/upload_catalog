<?php
namespace Hossein\Task1\controllers;
use Hossein\Task1\requests\uploadRequest;
class ProductControllers 
{
    public static function uploadCatalog($file)
    {
        $uploadRequest = new uploadRequest;
        $uploadRequest->validation();

    }
}