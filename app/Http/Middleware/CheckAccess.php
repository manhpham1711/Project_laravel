<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next) {

		if ($request->user() && $request->user()->route != "admin") {
			return redirect()->route('index', ["error" => "Bạn Không Có Quyền Truy Cập Vào Trang Này!, Dừng truy cập vào trang này nếu không muốn ăn Cơm Nhà Nước :)"]);
		}
		return $next($request);
	}
}
