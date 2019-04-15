<?php 

    namespace App\Repository;

    use App\Category;
    
    class Categories
    {
        public function getCategoryBySlug($slug)
        {
            return Category::where('slug',$slug)->first();
        }

        public function getCategoryById($id)
        {
            return Category::find($id);
        }

        public function getCategoriesTree()
        {
            return Category::with('children')->where('parent_id',0)->get();
        }

        public function store($request)
        {
            return Category::create($request->only('name','slug','parent_id'));
        }
    }