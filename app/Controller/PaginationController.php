<?php

namespace App\Controller;

require_once __DIR__ . "../../../vendor/autoload.php";

use \App\Model\Classes\Pagination;

class PaginationController
{
    public function paginationProducts($page)
    {
        $pag = new Pagination;
        $result = $pag->pagination($page);
        return $result;
    }
}