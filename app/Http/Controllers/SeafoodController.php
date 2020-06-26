<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class SeafoodController extends Controller {
	function index() {
		$seafood = Product::all();
		$cart = 0;
		if (Auth::user()) {
			$id = Auth::user()->id;
			$cart = Cart::all()->where('id_user', $id)->count();
			return view('index', ["data" => $seafood, 'numberProduct' => $cart]);
		} else {
			return view('index', ["data" => $seafood, 'numberProduct' => $cart]);
		}

	}
}
