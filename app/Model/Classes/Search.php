<?php

namespace App\Model\Classes;

use \App\Model\DataBase\DataBase;
use \App\Model\DataBase\Sql;

class Search
{
    public $conn;

    public function searchTitle()
    {
        $product = explode("/", filter_input(INPUT_GET, 'router'));
        
        if (!isset($product[2])) {
            header('location: ?router=Site/home/');
        }
        
        $name = "%" . trim($product[2]) . "%";

        $data = new DataBase;
        $db = $data->connection();
        
        $sql = new Sql($db);
        $result = $sql->selectSearchTitle('products', $name);

        return $result;
    }

    public function searchTitleD()
    {
        if (!isset($_POST['searchProduct'])) {
            header('location: ?router=Site/home/');
        }        
        
        $name = "%" . trim($_POST['searchProduct']) . "%";

        $data = new DataBase;
        $db = $data->connection();
        
        $sql = new Sql($db);
        $result = $sql->selectSearchTitle('products', $name);

        return $result;       
    }
}