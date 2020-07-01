<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;

class AdminPayController extends Controller {
	function index() {
		$data = DB::table('orders')
			->join('users', 'orders.id_user', '=', 'users.id')
			->join('sales', 'orders.id_Sale', '=', 'sales.id')
			->select('orders.id', 'orders.address', 'orders.phone', 'users.nameUser', 'orders.sumMoney', 'orders.product', 'sales.code', 'sales.percent', 'orders.created_at', 'orders.shipping')
			->orderBy('orders.created_at', 'desc')
			->get();

		return view('admin.pay.index', ["data" => $data]);
	}

	function delete($id) {
		$data = Order::find($id);
		$data->delete();
		echo "<script> alert('Xóa Thành Công'); </script>";
		return redirect()->route('admin.pay.index', ['delete']);
	}
	function confirm($id) {
		$data = Order::find($id);
		$data->shipping = true;
		$data->save();
		return redirect()->route('admin.pay.index', ['corect']);
	}
}
