<?php

namespace App\Controller;

class Site
{
    public function home()
    {
        require_once __DIR__ . '/../../resources/view/home.php';
    }

    public function product($productSearch)
    {
        $product = $productSearch;
        require_once __DIR__ . '/../../resources/view/product.php';
    }
    
    public function store()
    {
        require_once __DIR__ . '/../../resources/view/store.php';
    }

    public function productR($productSearch)
    {
        $product = $productSearch;
        require_once __DIR__ . '/../../resources/view/productR.php';
    }

    public function userLogin()
    {
        require_once __DIR__ . '/../../resources/view/userLogin.php';
    }

    public function userpanelH()
    {
        require_once __DIR__ . '/../../resources/view/userpanelH.php';
    }

    public function userpanelP($page)
    {
        $pag = $page;
        require_once __DIR__ . '/../../resources/view/userpanelP.php';
    }

    public function userpanelU()
    {
        require_once __DIR__ . '/../../resources/view/userpanelU.php';
    }

    //Methods

    public function LogoutController()
    {
        require_once 'LogoutController.php';
    }

    public function ProductController()
    {
        require_once 'ProductController.php';
    }

    public function UserController()
    {
        require_once 'UserController.php';
    }
}
