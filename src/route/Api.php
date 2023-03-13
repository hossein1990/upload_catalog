<?php
namespace Hossein\Task1\route;
use Hossein\Task1\repository\RepositoryProduct;
use Hossein\Task1\controllers\ProductControllers;
class Api extends Route
{
   public function uploadCatalog($file)
   {
    $productController = new ProductControllers(new RepositoryProduct);
   return $productController->uploadCatalog($file);
   }
}