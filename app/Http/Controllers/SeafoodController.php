<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
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

	function searchByPriceOrName(Request $request) {
		$cart = 0;
		if (Auth::user()) {
			$id = Auth::user()->id;
			$cart = Cart::all()->where('id_user', $id)->count();
		}
		$search = $request->search;
		$watches = Product::where('name', 'LIKE', '%' . $search . '%')->orWhere('price', 'LIKE', '%' . $search . '%')->get();
		return view('search', ['product' => $watches, "search" => $search, 'numberProduct' => $cart]);
	}
// desc
	function ascProductOrPrice(Request $request) {
		$cart = 0;
		if (Auth::user()) {
			$id = Auth::user()->id;
			$cart = Cart::all()->where('id_user', $id)->count();
		}
		$seafood = Product::orderBy('price', 'asc')->get();
		return view('index', ["data" => $seafood, 'numberProduct' => $cart]);
	}
	function descProductOrPrice(Request $request) {

		$cart = 0;
		if (Auth::user()) {
			$id = Auth::user()->id;
			$cart = Cart::all()->where('id_user', $id)->count();
		}
		$seafood = Product::orderBy('price', 'desc')->get();
		return view('index', ["data" => $seafood, 'numberProduct' => $cart]);
	}

	function detail($id) {
		$product = Product::find($id);
		$cart = 0;
		if (Auth::user()) {
			$id = Auth::user()->id;
			$cart = Cart::all()->where('id_user', $id)->count();
			return view('chitiet', ["infomation" => $product, 'numberProduct' => $cart]);
		} else {
			return view('chitiet', ["infomation" => $product, 'numberProduct' => $cart]);
		}
	}
}
