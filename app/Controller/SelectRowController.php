<?php

namespace App\Controller;

require_once __DIR__ . "../../../vendor/autoload.php";

use \App\Model\Classes\SelectRow;

class SelectRowController
{
    public function selectProduct()
    {
        
        $selRow = new SelectRow;
        $result = $selRow->selectById((!empty($_POST['productID'])) ? $_POST['productID'] : 1);
        return $result;
    }
}

/* $sel = new SelectRowController;
$resSel = $sel->selectProduct();
print_r($resSel);
var_dump($resSel); */