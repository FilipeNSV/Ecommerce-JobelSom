<?php

namespace App\Controller;

use \App\Model\Classes\Product;

class StoreController
{
    public function startStore()
    {
        $display = new Product;
        $result = $display->selectAllProducts();
        return $result;
    }
}