<?php
namespace Hossein\Task1\repository;

use Hossein\Task1\models\Product;
use Hossein\Task1\models\Brand;
use Hossein\Task1\models\Category;
class RepositoryProduct implements InterfaceProduct {
    public function saveOrUpdateProduct($produuct)
    {
       $productModel = new Product();
       $brandModel = new Brand();
       $categoryModel = new Category();
       $category["category"] = $produuct['Category'];
       $category["Category_id"] = $produuct['Category_ID'];
       $categorIds = $categoryModel->saveOrUpdate($category);
       $brandId =  $brandModel->saveOrUpdate($produuct["Brand"]);
       $produuct["brand_id"] = $brandId;
       return $productModel->saveOrUpdate($produuct);
    }
    public function saveItem($item) 
    {

    }
}