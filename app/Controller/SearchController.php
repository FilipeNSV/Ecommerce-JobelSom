<?php

namespace App\Controller;

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