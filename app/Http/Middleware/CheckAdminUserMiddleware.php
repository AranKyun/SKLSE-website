<?php

namespace App\Http\Middleware;
use App\User;
use Auth;
use Closure;
use Redirect;

class CheckAdminUserMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::user()->tag != 'admin') {
			return Redirect::to('/forbidToAdmin');
		}
		return $next($request);
	}
}
