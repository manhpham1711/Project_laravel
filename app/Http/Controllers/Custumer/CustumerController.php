<?php

namespace App\Http\Controllers\Custumer;

use App\Http\Controllers\Controller;

class CustumerController extends Controller {
	function index() {
		return view('custumer.information');
	}
}
