<?php

namespace App\Controller;

require_once __DIR__ . "../../../vendor/autoload.php";

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