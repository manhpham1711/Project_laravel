<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAccess {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		if (Auth::user()) {
			if (!Auth::user()->route == "admin") {
				//echo '<script> alerl("Bạn Không Có Quyền Truy Cập Này"); </script>';
				return redirect()->route('index');
			}
		} else {
			return redirect()->route('index');
		}
	}
}
