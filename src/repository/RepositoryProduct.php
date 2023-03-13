<?php
namespace Hossein\Task1\repository;

use Hossein\Task1\models\Product;
class RepositoryProduct implements InterfaceProduct {
    public function saveOrUpdateProduct($produuct)
    {
       $productModel = new Product();
       return $productModel->saveOrUpdate($produuct);
    }
    public function saveItem($item) 
    {

    }
}