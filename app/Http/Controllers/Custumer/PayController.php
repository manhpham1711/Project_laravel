<?php

namespace App\Http\Controllers\Custumer;

use App\Http\Controllers\Controller;
use App\Order;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayController extends Controller {

	function buy($id, Request $request) {

		$products = DB::table('carts')
			->where('id_user', $id)
			->join('products', 'carts.id_product', '=', 'products.id')
			->select('carts.quantity', 'products.name', 'products.price')
			->get();

		$sumSalary = 0;

		$sumSalary = DB::table('carts')
			->where('id_user', $id)
			->join('products', 'carts.id_product', '=', 'products.id')
			->sum(DB::raw('products.price * carts.quantity'));

		// <p> {{$d->sumMoney * ((100 - $d->percent)/100)}}  </p>

		if (Auth::user()->money < $sumSalary) {
			return redirect()->route('custumer.cart', ["money"]);
		} else {
			$discount = $request->discount;
			$account = User::find($id);
			$account->money = (Auth::user()->money) - ($sumSalary * ((100 - $discount) / 100));
			$account->save();

			$productPay = [];
			foreach ($products as $data) {
				$item =
					[
					"name" => $data->name,
					"quantity" => $data->quantity,
					"price" => $data->price,
				];
				array_push($productPay, $item);
			}

			$phoneCustumer = $request->phone;
			$addressCustumer = $request->address;

			$id_sale = $request->id_sale;

			$order = new Order;
			$order->sumMoney = $sumSalary;
			$order->phone = $phoneCustumer;
			$order->address = $addressCustumer;
			$order->id_user = $id;
			$order->id_Sale = $id_sale;
			$order->product = json_encode($productPay);
			$order->shipping = false;
			$order->save();

			return redirect()->route('index', ["pay" => "Thanh toán thành công. Chờ phê duyệt của Admin sẽ chuyển hàng"]);
		}
	}

	function sale(Request $request) {
		$code = $request->code;
		$sale = Sale::where('code', $code)->first();
		if (!is_null($sale)) {
			return redirect()->route('custumer.cart', ["discount" => $sale->percent, "id" => $sale->id]);
		} else {
			return redirect()->route('custumer.cart', ["NO"]);
		}
	}

	function cancelOrder($id) {
		$order = Order::find($id);
		$order->delete();
		$account = User::find(Auth::user()->id);
		$account->money = (Auth::user()->money) + ($order->sumMoney);
		$account->save();
		return redirect()->route('custumer.information', ["cancel"]);
	}

	function confirm($id) {
		$order = Order::find($id);
		$order->delete();
		return redirect()->route('custumer.information', ["confirm"]);
	}

}
