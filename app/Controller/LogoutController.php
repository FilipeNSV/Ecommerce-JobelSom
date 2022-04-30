<?php

namespace App\Controller;

require_once __DIR__.'/../../vendor/autoload.php';

use \App\Model\Classes\Logout;

class LougoutConttroller
{
    public function logout()
    {
        $logout = new Logout;
        $logout->logoutUserPanel();
    }
}

$logout = new LougoutConttroller;
$logout->logout();