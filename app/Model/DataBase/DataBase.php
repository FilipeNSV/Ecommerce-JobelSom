<?php

namespace App\Model\DataBase;

class DataBase
{
    public $conn;
    private $dbType = 'mysql';
    private $host = 'localhost';
    private $dbname = 'db_jobelsom';
    private $login = 'root';
    private $password = '';

    public function connection()
    {
        try{
            $this->conn = new \PDO($this->dbType.': host='.$this->host.'; dbname='.$this->dbname, $this->login, $this->password);
            //echo "Conexão estabelecida com sucesso!";
        }catch(\PDOException $erro){
            echo "Connection Established Not Successfully. Erro: " . $erro->getMessage(); 
        }

        return $this->conn;
    }
}

?>