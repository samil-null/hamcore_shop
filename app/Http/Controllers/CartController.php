<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function add(Request $request)
    {
        return $this->cart->add($request->post('id'),$request->post('amount'));
    }

    public function show()
    {
        $cart = $this->cart->getCart();
        
        if (!is_array($cart) || empty($cart['products'])) return view('cart.empty');

        return view('cart.index',compact('cart'));
    }

    public function remove(Request $request)
    {
        return $this->cart->remove($request->post('id'));
    }
}
