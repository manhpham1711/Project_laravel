<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminPayController extends Controller {
	function index() {
		$data = DB::table('orders')
			->join('users', 'orders.id_user', '=', 'users.id')
			->join('sales', 'orders.id_Sale', '=', 'sales.id')
			->select('orders.id', 'orders.address', 'orders.phone', 'users.nameUser', 'orders.sumMoney', 'orders.product', 'sales.code', 'sales.percent')
			->get();

		return view('admin.pay.index', ["data" => $data]);
	}
}
