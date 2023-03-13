<?php
namespace Hossein\Task1\route;
use Hossein\Task1\controllers\ProductControllers;
class Api extends Route
{
   public function uploadCatalog($file)
   {
    echo ProductControllers::uploadCatalog("hossein");
   }
}