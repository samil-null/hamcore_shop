<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsToMany(
            \App\Category::class,
            'categories_products',
            'category_id',
            'product_id');
    }

    public function hasProductById(int $id):bool
    {
    	return DB::table('products')->where('id', $id)->exists();
    }
}
