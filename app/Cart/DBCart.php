<?php

namespace App\Cart;

use Illuminate\Database\Eloquent\Model;

class DBCart extends Model implements Cart
{
    public function add(int $product_id, int $amount) 
    {
        
    }
}
