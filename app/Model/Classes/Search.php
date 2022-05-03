<?php

namespace App\Model\Classes;

use \App\Model\DataBase\DataBase;
use \App\Model\DataBase\Sql;

class Search
{
    public $conn;

    public function searchTitle()
    {
        if (!isset($_GET['searchProduct'])) {
            header('location: ../../../resources/view/home.php');
        }
        
        $name = "%" . trim($_GET['searchProduct']) . "%";

        $data = new DataBase;
        $db = $data->connection();
        
        $sql = new Sql($db);
        $result = $sql->selectSearchTitle('products', $name);

        return $result;
       
    }
}