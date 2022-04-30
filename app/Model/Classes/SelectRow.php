<?php

namespace App\Model\Classes;

require_once __DIR__.'/../../../vendor/autoload.php';

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class SelectRow
{
    public function selectById($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select("products WHERE id=$id");
        return $result;
    }
}