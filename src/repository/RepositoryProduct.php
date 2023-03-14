<?php
namespace Hossein\Task1\repository;

use Hossein\Task1\models\Product;
use Hossein\Task1\models\Brand;
use Hossein\Task1\models\Category;
use Hossein\Task1\models\Item;
use Hossein\Task1\models\Color;
use Hossein\Task1\models\Size;
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

        ////////////////////////////
        $sizeModel = new Size();
        $sizeName= $item["Size"];
        $sizeId = $sizeModel->saveOrUpdate($sizeName);
        $sizeFamilyName= is_array($item["Size_Family"])?json_encode($item["Size_Family"]):$item["Size_Family"];
        $sizeFamilyId = $sizeModel->saveOrUpdate($sizeFamilyName);
        ///////////////////////////
        $item["color_id"] = $colorId;
        $item["color_family_id"] = $colorFamilyId;
        $item["size_id"] = $sizeId;
        $item["size_family_id"] = $sizeFamilyId;
        $item["product_id"] = $productId;
        $itemModel = new Item();
        $itemModel->saveOrUpdate($item);
    }
}