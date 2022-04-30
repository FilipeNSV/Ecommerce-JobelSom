<?php

namespace App\Controller;

use \App\Model\Classes\Home;

class HomeController
{
    public function updateS1HById()
    {
        if (isset($_POST['S1IdUpadate']) && !empty($_POST['S1IdUpadate'])) {
            $image = $_FILES['HomeS1ImgUpadate'];
            $s1 = new Home;
            $result = $s1->updateS1ById($_POST['S1IdUpadate'], $_POST['HomeS1TiUpadate'], '../img/'.$image['name']);
            return $result;
        }
    }

    public function S1SelectReturn()
    {
        $s1 = new Home;
        $result = $s1->selectS1((!empty($_GET['id'])) ? $_GET['id'] : 1);
        return $result;
    }
    
    public function updateS2HById()
    {
        if (isset($_POST['S2IdUpadate']) && !empty($_POST['S2IdUpadate'])) {
            $s1 = new Home;
            $result = $s1->updateS2ById($_POST['S2IdUpadate'], $_POST['HomeS2TiUpadate'], $_POST['HomeS2SubUpadate'], $_POST['HomeS2DeUpadate'], $_POST['HomeS2ImgUpadate']);
            return $result;
        }
    }

    public function S2SelectReturn($id)
    {
        $s1 = new Home;
        $result = $s1->selectS2($id);
        return $result;
    }
    
    public function updateS3HById()
    {
        if (isset($_POST['S3IdUpadate']) && !empty($_POST['S3IdUpadate'])) {
            $s1 = new Home;
            $result = $s1->updateS3ById($_POST['S3IdUpadate'], $_POST['HomeS3TiUpadate'], $_POST['HomeS3DeUpadate']);
            return $result;
        }
    }

    public function S3SelectReturn()
    {
        $s1 = new Home;
        $result = $s1->selectS3((!empty($_GET['id'])) ? $_GET['id'] : 1);
        return $result;
    }
    
    public function updateS4HById()
    {
        if (isset($_POST['S4IdUpadate']) && !empty($_POST['S4IdUpadate'])) {
            $s1 = new Home;
            $result = $s1->updateS4ById($_POST['S4IdUpadate'], $_POST['HomeS4TiUpadate'], $_POST['HomeS4SubUpadate'], $_POST['HomeS4DeUpadate'], $_POST['HomeS4ImgUpadate']);
            return $result;
        }
    }

    public function S4SelectReturn($id)
    {
        $s1 = new Home;
        $result = $s1->selectS4($id);
        return $result;
    }
    
    public function updateS5HById()
    {
        if (isset($_POST['S5IdUpadate']) && !empty($_POST['S5IdUpadate'])) {
            $s1 = new Home;
            $result = $s1->updateS5ById($_POST['S5IdUpadate'], $_POST['HomeS5TiUpadate'], $_POST['HomeS5SubUpadate'], $_POST['HomeS5DeUpadate'], $_POST['HomeS5ImgUpadate']);
            return $result;
        }
    }

    public function S5SelectReturn($id)
    {
        $s1 = new Home;
        $result = $s1->selectS5($id);
        return $result;
    }
    
}