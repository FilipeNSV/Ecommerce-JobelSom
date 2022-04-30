<?php

namespace App\Model\Classes;

require_once __DIR__.'/../../../vendor/autoload.php';

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class Product
{
    private $table = "products";

    public function insertProduct($titulo, $subtitulo, $descricao, $URL, $tituloD, $descricaoC)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->insert($this->table, "titulo, subtitulo, descricao, urlimg, titulodesc, descricaocomp", ":TI, :SU, :DE, :UR, :TID, :DEC", array(
            ':TI' => $titulo,
            ':SU' => $subtitulo,
            ':DE' => $descricao,
            ':UR' => $URL,
            ':TID' => $tituloD,
            ':DEC' => $descricaoC
        ));   
        
        return $result;
    }

    public function selectProduct($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select($this->table . " WHERE " . "id=$id");
        return $result;
    }

    public function selectAllProducts()
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select($this->table);
        return $result;
    }

    public function updateProductById($id, $titulo, $subtitulo, $descricao, $URL, $tituloD, $descricaoC)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->update($this->table, "titulo = :TI, subtitulo = :SU, descricao = :DE, urlimg = :UR, titulodesc = :TID, descricaocomp = :DEC WHERE id = :ID", array(
            ':ID' => $id,
            ':TI' => $titulo,
            ':SU' => $subtitulo,
            ':DE' => $descricao,
            ':UR' => $URL,
            ':TID' => $tituloD,
            ':DEC' => $descricaoC
        ));
        
        return $result;
    }

    public function deleteProduct($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->delete($this->table, $id);
        return $result;
    }   

}