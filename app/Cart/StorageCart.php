<?php

namespace App\Cart;

use Session;
use App\Product;
use App\Cart\CartTrait;
use Illuminate\Database\Eloquent\Model;

class StorageCart extends Model implements Cart
{
    use CartTrait;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function add(int $product_id, int $amount):array
    {
        
    	if (is_int($product_id) && is_int($amount) && $this->product->hasProductById($product_id) && $this->product->hasProductById($product_id) && $amount > 0) {

            if (!Session::get('cart')) {
                $this->createCart();
            }
            
            $cart = Session::get('cart');
            
            $amountProducts = $this->plusAmoutProduct($amount);

            $cart[$product_id] = ($cart[$product_id]??0) + $amount;  

            
            Session::put('cart', $cart);

            return $this->cartResponse(true,$amountProducts);
    		
    	}

        return $this->cartResponse(false, $amountProducts, 'incorrect data');

    }

    private function createCart()
    {
    	Session::put('amountProducts',0);
    	Session::put('cart', []);
    }

    private function cartResponse(bool $success, int $amount, string $error = null):array
    {
    	return [
    		'success' => $success,
    		'error' => $error,
    		'amount' => $amount
    	];
    }

    public function getCart()
    {
        return $this->buildCart(Session::get('cart'));
    }

    public function remove($product_id)
    {
        $cart = Session::get('cart');

        unset($cart[$product_id]);

        Session::put('cart',$cart);

        return $this->cartResponse(true,0);
    }

    public function initAmountCart()
    {
        
    }

    public function getAmountCartProduct()
    {   
        return Session::get('amountProducts');
    }

    public function minusAmoutProduct($amount)
    {
        $amountProducts = (int) $this->getAmountCartProduct();

        $amountProducts -= $amount;

        return $this->saveAmoutProduct($amountProducts);
    }

    public function plusAmoutProduct($amount)
    {
        $amountProducts = (int) $this->getAmountCartProduct();

        $amountProducts += $amount;

        return $this->saveAmoutProduct($amountProducts);
    }

    public function saveAmoutProduct($amount)
    {
        Session::put('amountProducts',$amount);

        return $amount;
    }

}
