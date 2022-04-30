<?php

namespace App\Controller;

use \App\Model\Classes\DisplayHome;

class DisplayHomeController
{
    public function startDisplayS1()
    {
        $display = new DisplayHome;
        $result = $display->displayOnS1();
        return $result;
    }
    
    public function startDisplayS2()
    {
        $display = new DisplayHome;
        $result = $display->displayOnS2();
        return $result;
    }

    public function startDisplayS3()
    {
        $display = new DisplayHome;
        $result = $display->displayOnS3();
        return $result;
    }

    public function startDisplayS4()
    {
        $display = new DisplayHome;
        $result = $display->displayOnS4();
        return $result;
    }
    
    public function startDisplayS5()
    {
        $display = new DisplayHome;
        $result = $display->displayOnS5();
        return $result;
    }
    
    public function startDisplayUsers()
    {
        $display = new DisplayHome;
        $result = $display->displayOnTableUsers();
        return $result;
    }


}

/* $display = new DisplayController;
$result = $display->startDisplayS3();
print_r($result[0]['titulo']); */