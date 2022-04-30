<?php

namespace App\Controller;

use \App\Model\Classes\DisplayPanel;

class DisplayPanelController
{
    public function startDisplayPProducts($page)
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPTableProducts($page);
        return $result;
    }

    public function paginationProducts($page)
    {
        $pag = new DisplayPanel;
        $result = $pag->pagination($page);
        return $result;
    }

    public function startDisplayPS1()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPS1();
        return $result;
    }
    
    public function startDisplayPS2()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPS2();
        return $result;
    }

    public function startDisplayPS3()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPS3();
        return $result;
    }

    public function startDisplayPS4()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPS4();
        return $result;
    }
    
    public function startDisplayPS5()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPS5();
        return $result;
    }
    
    public function startDisplayPUsers()
    {
        $display = new DisplayPanel;
        $result = $display->displayOnPTableUsers();
        return $result;
    }
}

/* $display = new DisplayController;
$result = $display->startDisplayS3();
print_r($result[0]['titulo']); */