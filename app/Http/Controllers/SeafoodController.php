<?php

namespace App\Http\Controllers;
use App\Product;

class SeafoodController extends Controller {
	function index() {
		$seafood = Product::all();
		return view('index', ["data" => $seafood]);
	}
}
