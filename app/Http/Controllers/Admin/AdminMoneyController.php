<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transactions;
use App\User;

class AdminMoneyController extends Controller {
	function index() {
		$data = Transactions::all();
		return view('admin.money.index', ['data' => $data]);
	}

	function confirm($id) {
		$order = Transactions::find($id);
		$account = User::firstWhere('id', $order->id_user);
		$account->money = $account->money + $order->amount;
		$account->save();
		$order->delete();
		return redirect()->route('admin.money', ["corect"]);

	}

	function delete($id) {
		$order = Transactions::find($id);
		$order->delete();
		return redirect()->route('admin.money', ["incorect"]);
	}

}
