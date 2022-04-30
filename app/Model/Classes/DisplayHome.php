<?php

namespace App\Model\Classes;

require_once __DIR__ . "/../../../vendor/autoload.php";

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class DisplayHome
{
    public function displayOnS1()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('carousel_se1');

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function displayOnS2()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se2');

        return $result;
    }

    public function displayOnS3()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('service_se3');

        return $result->fetchAll(\PDO::FETCH_ASSOC);        
    }

    public function displayOnS4()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se4');

        return $result;
    }

    public function displayOnS5()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se5');

        return $result;
    }
    
    public function displayOnTableUsers()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('users');

        return $result;
    }

    
}
