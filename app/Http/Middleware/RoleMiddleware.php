<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  String $role
   * @return mixed
   */
  public function handle($request, Closure $next, $role) {
    if (!$request->user()->hasRole($role)) {
      // TODO: Redirect to access denied page
    }
    return $next($request);
  }
}
