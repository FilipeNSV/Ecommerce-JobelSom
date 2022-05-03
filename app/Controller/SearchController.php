<?php

namespace App\Controller;

use App\Model\Classes\Search;

class SearchController
{
    public function productSearchTitle()
    {
        $search = new Search;
        $result = $search->searchTitle();
        return $result;
    }
}