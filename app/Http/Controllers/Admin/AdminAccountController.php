<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminAccountController extends Controller {
	function index() {
		$dataUser = User::all();
		return view('admin.user.index', ['dataUser' => $dataUser]);
	}

	function delete($id) {
		$user = User::find($id);
		$user->delete();
		return redirect()->route('admin.user.index');
	}

	function formEditRoute($id) {
		$dataEdit = User::find($id);
		return view('admin.user.editRoute', ['data' => $dataEdit]);
	}

	function updateRoute(Request $request, $id) {
		$route = $request->route;
		$user = User::find($id);
		$user->route = $route;
		$user->save();

		return redirect()->route('admin.user.index');
	}

}
