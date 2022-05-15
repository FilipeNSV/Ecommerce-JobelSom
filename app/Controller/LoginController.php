<?php

namespace App\Controller;

if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . "/../../vendor/autoload.php";

use \App\Model\Classes\Login;

class LoginController
{

    public $conn;

    public function loginValidation()
    {
        $login = new Login;
        $login->login();
    }
}
