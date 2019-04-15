<?php 

    namespace App\Cart;

    interface Cart
    {
        public function add(int $product_id, int $amount);
        public function getCart();
        
    }