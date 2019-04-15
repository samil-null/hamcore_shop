<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Auth;
use App\Cart;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cart = (Auth::check())?'App\Cart\DBCart':'App\Cart\StorageCart';

        $this->app->bind(
            'App\Cart\Cart',
            $cart
        );
    }
}
