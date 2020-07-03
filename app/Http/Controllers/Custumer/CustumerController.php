<?php

namespace App\Http\Controllers\Custumer;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustumerController extends Controller {
	function index() {
		$order = Order::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
		return view('custumer.information', ['data' => $order]);
	}

	function changePassword(Request $request) {
		$newPassword = Hash::make($request->newPassword);
		$account = User::find(Auth::user()->id);
		$account->password = $newPassword;
		$account->save();
		return redirect()->route('custumer.information', ['corect']);

	}

}
