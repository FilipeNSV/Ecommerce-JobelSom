<?php

namespace App\Controller;
require_once __DIR__ . "../../../vendor/autoload.php";

use App\Model\Classes\Search;

class SearchController
{
    public function productSearch()
    {
        $search = new Search;
        $result = $search->search();
        return $result;
    }
}