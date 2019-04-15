<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\Categories;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $categories; 

    public function __construct(Categories $categories) 
    {
        $this->categories = $categories;
    }
    public function index()
    {
        $categories = $this->categories->getCategoriesTree();
        $paddingLeft = 10;
        return view('admin.category.index',compact('categories','paddingLeft'));
    }

    public function create()
    {
        $categories = $this->categories->getCategoriesTree();
        $delimiter = '';
        return view('admin.category.category',compact('categories','delimiter'));
    }

    public function show($id)
    {
        $category = $this->categories->getCategoryById($id);
        $categories = $this->categories->getCategoriesTree();
        $delimiter = '';
        return view('admin.category.category',compact('category','categories','delimiter'));
    }

    public function store(Request $request)
    {
        $category = $this->categories->store($request);

        return  redirect()->route('admin.category.show', ['id' => $category->id]);
    }
}
