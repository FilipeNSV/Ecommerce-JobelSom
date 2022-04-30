<?php

namespace App\Model\Classes;

require_once __DIR__ . "/../../../vendor/autoload.php";

use \App\Model\DataBase\DataBase;
use \App\Model\DataBase\Sql;

class Search
{
    public $conn;

    public function search()
    {
        if (!isset($_GET['searchProduct'])) {
            header('location: ../../../resources/view/home.php');
        }
        
        $name = "%" . trim($_GET['searchProduct']) . "%";

        $data = new DataBase;
        $db = $data->connection();
        
        $sql = new Sql($db);
        $result = $sql->selectSearch('products', $name);

        return $result;
       
    }
}