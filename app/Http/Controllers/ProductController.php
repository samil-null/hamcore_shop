<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Repository\Products;

class ProductController extends Controller
{
    private $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }
    public function show($slug)
    {
        $product = $this->products->get_product($slug);

        return view('product.index',compact('product'));
    }
}
