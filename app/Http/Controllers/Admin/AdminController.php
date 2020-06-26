<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

	function index() {
		if (Auth::user()->route == "admin") {
			return view('admin.index');
		} else {
			echo '<script> alerl("Bạn Không Có Quyền Truy Cập Này"); </script>';
			return redirect()->route('index');
		}

	}

}
