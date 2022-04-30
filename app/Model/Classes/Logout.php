<?php

namespace App\Model\Classes;

class Logout
{
    public function logoutUserPanel()
    {
        session_start();
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location: ../../resources/view/userlogin.php');
    }
}
