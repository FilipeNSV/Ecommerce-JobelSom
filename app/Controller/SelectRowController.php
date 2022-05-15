<?php

namespace App\Controller;

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