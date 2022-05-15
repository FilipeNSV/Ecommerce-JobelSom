<?php

namespace App\Controller;

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
