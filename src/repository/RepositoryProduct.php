<?php
namespace Hossein\Task1\repository;

use Hossein\Task1\models\Product;
use Hossein\Task1\models\Brand;
use Hossein\Task1\models\Category;
use Hossein\Task1\models\Item;
use Hossein\Task1\models\Color;
class RepositoryProduct implements InterfaceProduct {
    public function saveOrUpdateProduct($product)
    {
       $productModel = new Product();
       $brandModel = new Brand();
       $categoryModel = new Category();
       $category["name"] = $product['Category'];
       $category["id"] = $product['Category_ID'];
       $categoryModel->saveOrUpdate($category);
       $category["name"] = $product['SubCategory'];
       $category["id"] = $product['SubCategory_ID'];
       $category["parent_id"] = $product['Category_ID'];
       $categoryModel->saveOrUpdate($category);
       $brandId =  $brandModel->saveOrUpdate($product["Brand"]);
       $product["brand_id"] = $brandId;
       return $productModel->saveOrUpdate($product);
    }
    public function saveOrUpdateItem($item,$productId) 
    {
        $colorModel = new Color();
        $colorName= $item["Color"];
        $colorId = $colorModel->saveOrUpdate($colorName);
        $colorFamilyName= $item["Color_Family"];
        $colorFamilyId = $colorModel->saveOrUpdate($colorFamilyName);
        $item["color_id"] = $colorId;
        $item["color_family_id"] = $colorFamilyId;
        $item["product_id"] = $productId;
        $itemModel = new Item();
        $itemModel->saveOrUpdate($item);
    }
}