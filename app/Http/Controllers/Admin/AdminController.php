<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Transactions;
use App\User;

class AdminController extends Controller {

	function index() {
		$order = Order::all()->count();
		$product = Product::all()->count();
		$user = User::all()->count();
		$numberMoney = Transactions::all()->count();

		return view('admin.index', ['order' => $order, 'product' => $product, 'user' => $user, 'money' => $numberMoney]);

	}

}
