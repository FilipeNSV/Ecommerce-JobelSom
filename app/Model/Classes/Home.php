<?php

namespace App\Model\Classes;

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class Home
{
    private $dataTableKeysCards = "titulo = :TI, subtitulo = :SU, descricao = :DE, urlimg = :UR WHERE id = :ID";

    public function selectS1($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select(" carousel_se1 WHERE " . "id=$id");
        return $result;
    }

    public function updateS1ById($id, $titulo, $URL)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $sql->update("carousel_se1", "titulo = :TI, urlimgcarousel = :UR WHERE id = :ID", array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':UR' => $URL
        ));        
    }
    
    public function selectS2($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select(" card_se2 WHERE " . "id=$id");
        return $result;
    }

    public function updateS2ById($id, $titulo, $subtitulo, $descricao, $URL)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $sql->update("card_se2", $this->dataTableKeysCards, array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':SU' => $subtitulo,
            ':DE' => $descricao,
            ':UR' => $URL
        ));        
    }
    
    public function selectS3($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select(" service_se3 WHERE " . "id=$id");
        return $result;
    }

    public function updateS3ById($id, $titulo, $descricao)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $sql->update("service_se3", "titulo = :TI, descricao = :DE WHERE id = :ID", array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':DE' => $descricao
        ));        
    }
    
    public function selectS4($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select(" card_se4 WHERE " . "id=$id");
        return $result;
    }

    public function updateS4ById($id, $titulo, $subtitulo, $descricao, $URL)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $sql->update("card_se4", $this->dataTableKeysCards, array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':SU' => $subtitulo,
            ':DE' => $descricao,
            ':UR' => $URL
        ));        
    }
    
    public function selectS5($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select(" card_se5 WHERE " . "id=$id");
        return $result;
    }

    public function updateS5ById($id, $titulo, $subtitulo, $descricao, $URL)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $sql->update("card_se5", $this->dataTableKeysCards, array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':SU' => $subtitulo,
            ':DE' => $descricao,
            ':UR' => $URL
        ));        
    }
}
