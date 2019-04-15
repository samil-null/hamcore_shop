<?php 

    namespace App\Repository;

    use App\Product;
    
    class Products
    {
        public function get_product($slug)
        {
            return Product::where('slug',$slug)->first();
        }

        public function getProducts($amountInPage = 10)
        {
            return Product::paginate($amountInPage);
        }
    }