<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminPayController extends Controller {
	function index() {
		$data = DB::table('orders')
			->join('products', 'orders.id_product', '=', 'products.id')
			->join('users', 'orders.id_user', '=', 'users.id')
			->select('orders.id', 'users.nameUser', 'products.name', 'orders.quantity', 'products.price')
			->get();

		echo $data;
	}
}
