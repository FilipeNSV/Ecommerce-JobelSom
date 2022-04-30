<?php

namespace App\Model\Classes;

require_once __DIR__.'/../../../vendor/autoload.php';

use \App\Model\DataBase\Sql;
use \App\Model\DataBase\DataBase;

class User
{
    private $table = "users";
    private $dataTable = "primeironome, segundonome, email, senha";
    private $keys = ":PN, :SN, :EM, :SE";
    private $dataTableKeys = "primeironome = :PN, segundonome = :SN, email = :EM, senha = :SE WHERE id = :ID";

    public function insertUser($primeiroNome, $segundoNome, $email, $senha)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->insert($this->table, $this->dataTable, $this->keys, array(
            ':PN' => $primeiroNome,
            ':SN' => $segundoNome,
            ':EM' => $email,
            ':SE' => $senha
        ));
        return $result;
    }

    public function selectUsers($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->select($this->table . " WHERE " . "id=$id");
        return $result;
    }

    public function updateUserById($id, $primeiroNome, $segundoNome, $email, $senha)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->update($this->table, $this->dataTableKeys, array(
            ':ID' => $id,
            ':PN' => $primeiroNome,
            ':SN' => $segundoNome,
            ':EM' => $email,
            ':SE' => $senha
        ));
        
        return $result;
    }

    public function deleteUser($id)
    {
        $database = new DataBase;
        $db = $database->connection();

        $sql = new Sql($db);
        $result = $sql->delete($this->table, $id);
        return $result;
    }   

}