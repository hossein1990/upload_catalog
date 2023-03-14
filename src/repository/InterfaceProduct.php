<?php
namespace Hossein\Task1\repository;

interface InterfaceProduct {
    public function saveOrUpdateProduct($produuct);
    public function saveOrUpdateItem($item,$productid);
}