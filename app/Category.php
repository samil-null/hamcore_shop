<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id', 'slug'];

    public function products()
    {
        return $this->belongsToMany(
            'App\Product',
            'categories_products',
            'category_id',
            'product_id')->get();
    }

   public function children()
   {
       return $this->hasMany(self::class,'parent_id');
   }
}
