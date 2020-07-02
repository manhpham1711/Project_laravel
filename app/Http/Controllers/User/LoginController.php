<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
	function index() {
		return view('user.index');
	}
	function register() {
		return view('user.register');
	}

	function create(Request $request) {
		$name = $request->name;
		$username = $request->username;
		$password = $request->password;
		$route = 'custumer';
		$pass = Hash::make($password);
		DB::table('users')->insert(["nameUser" => $name, "username" => $username, "password" => $pass, "route" => $route]);
		return redirect()->route('user.index');
	}

	function login(Request $request) {
		$username = $request->username;
		$pass = $request->password;

		if (Auth::attempt(["username" => $username, "password" => $pass])) {
			$user = Auth::user();
			if ($user->route == "admin") {
				return redirect()->route('admin.index');
			} else {
				return redirect()->route('index');
			}
		} else {

			return redirect()->route('user.login', ['incorect']);
		}

	}

	function logout() {
		Auth::logout();
		return redirect()->route('index');

	}

}
