<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Categories;

class CategoryController extends Controller
{

    private $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function show($slug)
    {
        dump( $this->categories->getCategoryBySlug($slug)->products());
    }
}
