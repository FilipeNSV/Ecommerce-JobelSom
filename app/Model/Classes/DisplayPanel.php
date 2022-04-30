<?php

namespace App\Model\Classes;

require_once __DIR__ . "/../../../vendor/autoload.php";

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class DisplayPanel
{
    private $limit = 4;
    //private $page = intval($_GET['page']);

    public function displayOnPTableProducts($page)
    {
        $start = ($this->limit * $page) - $this->limit;

        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select("products LIMIT $start, $this->limit");

        return $result;
    }

    public function pagination($page)
    {
        $start = ($this->limit * $page) - $this->limit;

        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $lastPage = ceil($sql->select("products LIMIT $start, $this->limit"));


        $totalPages = ceil($lastPage / $this->limit);

        return $totalPages;
    }

    public function displayOnPS1()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('carousel_se1');

        return $result;
    }

    public function displayOnPS2()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se2');

        return $result;
    }

    public function displayOnPS3()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('service_se3');

        return $result;
    }

    public function displayOnPS4()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se4');

        return $result;
    }

    public function displayOnPS5()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('card_se5');

        return $result;
    }

    public function displayOnPTableUsers()
    {
        $data = new DataBase;
        $db = $data->connection();

        $sql = new Sql($db);
        $result = $sql->select('users');

        return $result;
    }
}
