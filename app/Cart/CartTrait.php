<?php 

	namespace App\Cart;

	use App\Product;

	trait CartTrait
	{

		private $totalCartPrice = 0;

		private function buildCart($cart_data)
		{
			$result = [
				'products' => [],
				'totalCartPrice' => 0
			];
			
			if (!is_array($cart_data)) return false;
			
			foreach ($cart_data as $id => $amount) {
				$result['products'][] = $this->buildProduct($id,$amount);
			}

			$result['totalCartPrice'] = $this->totalCartPrice;

			return $result;

		}

		public function buildProduct($id,$amount)
		{
			$product = Product::find($id);

			if (!$product) echo "<h1>Error</h1>";

			$totalPrice = $product['price'] * $amount;

			$this->totalCartPrice += $totalPrice;

			return [
				'product' => $product,
				'totalPrice' => $totalPrice,
				'amount' => $amount
			];
		}
	}