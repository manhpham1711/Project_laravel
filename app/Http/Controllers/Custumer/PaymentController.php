<?php

namespace App\Http\Controllers\Custumer;

use App\Http\Controllers\Controller;
use App\Transactions;
use Illuminate\Http\Request;

class PaymentController extends Controller {
	function filed(Request $request, $id) {
		$transactions = new Transactions;

		$transactions->id_user = $id;
		$transactions->amount = $request->money;
		$transactions->save();
		return redirect()->route('custumer.cart', ["payment"]);
	}

}
