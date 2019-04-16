<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\Products;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    private $products;

    public function __construct(Products $products)
    {
        $this->products = $products;
    }
    public function index()
    {
        $products = $this->products->getProducts();

        return view('admin.product.index',compact('products'));
    }

    public function show($id)
    {
        return view('admin.product.product');
    }
}
