<?php

namespace App\Http\Controllers\Custumer;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;

class PayController extends Controller {
	function buy($id) {
		$products = Cart::all()->where('id_user', $id);
		foreach ($products as $data) {
			$product = new Order;
			$product->quantity = $data->quantity;
			$product->id_user = $id;
			$product->id_product = $data->id_product;
			$product->save();
		}
		return redirect()->route('index', ["pay" => "Thanh toán thành công. Chờ phê duyệt của Admin sẽ chuyển hàng"]);
	}

}

// INSERT INTO Bang2(Cot1, Cot2, Cot3)
// SELECT Cot1, Cot2, Cot3
// FROM Bang1