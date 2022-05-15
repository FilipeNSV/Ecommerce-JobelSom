<?php

namespace App\Model\Classes;

use \App\Model\DataBase\DataBase;
use \App\Model\DataBase\Sql;
use PDOException;

class Pagination
{
    public function countRows()
    {
        $db = new DataBase;
        $dbh = $db->connection();

        $sql = new Sql($dbh);
        $result = $sql->select("products");

        return $result->fetchAll();
    }

    public function pagination($page)
    {
        try {
            $html = '';
            $limit = 4;
            $start = ($limit * $page) - $limit;
            $lastPage = count($this->countRows());
            $totalPages = ceil($lastPage / $limit);

            $html .= 'Limite: ' . $limit . ' | Começo: ' . $start . ' | Total Rows: ' . $lastPage . ' | Numero Pag.: ' . $totalPages;

            return $totalPages;
        } catch (PDOException $err) {
            return 'Erro: ' . $err->getMessage();
        }
    }
}

