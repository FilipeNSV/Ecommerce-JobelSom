<?php

namespace App\Model\Classes;

use \App\Model\DataBase\DataBase;

class Login
{
    public $conn;

    public function login()
    {
        if (!empty($_POST['btnLogin'])) {
            $db = new DataBase;
            $bdh = $db->connection();
            $this->conn = $bdh;

            $email = $_POST['email'];
            $senha = $_POST['senha'];            

            $cmd = "SELECT * FROM users WHERE email = :EM LIMIT 1";            
            $stmt = $this->conn->prepare($cmd);
            $stmt->bindParam(':EM', $email);
            $stmt->execute();
            
            if($stmt->rowCount() !=0){
                $rowUser = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($senha == $rowUser['senha']){
                    $_SESSION['email'] = $email;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['primeironome'] = $rowUser['primeironome'];
                    $_SESSION['segundonome'] = $rowUser['segundonome'];
                    header("location: ?router=Site/userpanelP/");
                }else{
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    header('location: ?router=Site/home/');
                }
        } else {
            header('location: ?router=Site/userlogin/');
            
            }
        }
    }
}
