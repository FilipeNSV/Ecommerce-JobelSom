<?php

namespace App\Controller;

require_once __DIR__ . "../../../vendor/autoload.php";

use \App\Model\Classes\Product;

class ProductController
{
    public function productRegister()
    {
        if (isset($_POST['ProductTiInsert']) && !empty($_POST['ProductTiInsert'])) {
            $image = $_FILES['ProductImgInsert'];
            $user = new Product;
            move_uploaded_file($image['tmp_name'], '../../resources/img/' . $image['name']);
            
            $result = $user->insertProduct($_POST['ProductTiInsert'], $_POST['ProductSubInsert'], $_POST['ProductDeInsert'], 'resources/img/' . $image['name'], $_POST['ProductTiDInsert'], $_POST['ProductDeCInsert']);
            header("location: ?router=Site/userpanelP/");
            return $result;
        }
    }

    public function productUpdate()
    {
        if (isset($_POST['ProductIdUpadate']) && !empty($_POST['ProductIdUpadate'])) {
            $image = $_FILES['ProductImgUpadate'];
            $user = new Product;
            $result = $user->updateProductById($_POST['ProductIdUpadate'], $_POST['ProductTiUpadate'], $_POST['ProductSubUpadate'], $_POST['ProductDeUpadate'], '../img/' . $image['name'], $_POST['ProductTiDUpadate'], $_POST['ProductDeCUpadate']);
            return $result;
        }
    }

    public function productDelete()
    {
        if (isset($_POST['ProductIDDelete']) && !empty($_POST['ProductIDDelete'])) {
            $user = new Product;
            $result = $user->deleteProduct($_POST['ProductIDDelete']);
            return $result;
        }
    }
}

$product = new ProductController;
$product->productRegister();
