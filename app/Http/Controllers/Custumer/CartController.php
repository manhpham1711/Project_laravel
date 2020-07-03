<?php

namespace App\Http\Controllers\Custumer;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {

	function indexCart() {
		if (Auth::user()) {
			$idCustumer = Auth::user()->id;
			$data = DB::table('carts')
				->where('id_user', $idCustumer)
				->join('products', 'carts.id_product', '=', 'products.id')
				->select('carts.id', 'carts.quantity', 'products.name', 'products.price', 'products.image')
				->get();

			$sumSalary = 0;

			$sumSalary = DB::table('carts')
				->where('id_user', $idCustumer)
				->select('carts.id', 'carts.quantity', 'products.name', 'products.price', 'products.image')
				->join('products', 'carts.id_product', '=', 'products.id')
				->sum(DB::raw('products.price * carts.quantity'));

			//echo $data;
			return view('custumer.cart', ['dataCart' => $data, 'sumSalary' => $sumSalary]);
		} else {
			return redirect()->route('index', ["error" => "Vui Lòng Đăng Nhập Để Dùng Chức Năng Này!"]);
		}

	}

	function addCart($id) {
		$idCustumer = Auth::user()->id;

		$cart = Cart::all()->where('id_product', $id)
			->where('id_user', $idCustumer);

		if ($cart->count() == 1) {

			$cartOld = Cart::where('id_product', $id)->first();
			$quantity = $cartOld->quantity + 1;
			$cartOld->quantity = $quantity;
			$cartOld->save();

			return redirect()->route('index', ["cart" => "Thêm vào giỏ hàng Thành Công"]);
		} else {

			$cartNew = new Cart;
			$cartNew->id_product = $id;
			$cartNew->quantity = 1;
			$cartNew->id_user = $idCustumer;
			$cartNew->save();

			return redirect()->route('index', ["cart" => "Thêm vào giỏ hàng Thành Công"]);
		}
	}

	function updateIncreaseQuantity($id) {

		$cart = Cart::find($id);
		$quantity = $cart->quantity + 1;
		$cart->quantity = $quantity;
		$cart->save();

		return redirect()->route('custumer.cart');

	}

	function updateReductionQuantity($id) {
		$cart = Cart::find($id);
		$quantity = $cart->quantity - 1;

		if ($quantity < 1) {
			$quantity = 1;

			$cart->quantity = $quantity;
			$cart->save();

			return redirect()->route('custumer.cart');
		} else {
			$cart->quantity = $quantity;
			$cart->save();

			return redirect()->route('custumer.cart');
		}
	}

	function delete($id) {
		$cart = Cart::find($id);
		$cart->delete();
		return redirect()->route('custumer.cart');
	}

	function deleteAll() {
		$idCustumer = Auth::user()->id;
		// xóa tất cả bảng DB::table('carts')->truncate();

		DB::table('carts')->where('id_user', $idCustumer)->delete();
		return redirect()->route('custumer.cart');
	}

}
