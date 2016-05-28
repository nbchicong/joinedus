<?php

namespace App\Http\Middleware;

use Log;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class RoleMiddleware {
  /**
   * The Guard implementation.
   *
   * @var Guard
   */
  protected $auth;

  /**
   * Create a new filter instance.
   *
   * @param  Guard  $auth
   */
  public function __construct(Guard $auth) {
    $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  String $role
   * @return mixed
   */
  public function handle($request, Closure $next, $role) {
    if ($this->auth->guest()) {
      if ($request->ajax()) {
        return response('Unauthorized.', 401);
      } else {
        return redirect()->guest('login');
      }
    } else {
      Log::debug("User logging - ", ["user" => $this->auth->user()]);
      Log::debug("Role checking - ". $role);
      Log::debug("Has role - ". $this->auth->user()->hasRole($role));
      if ($this->auth->user()->hasRole($role)) {
        return $next($request);
      } else {
        return redirect()->guest('/');
      }
    }
  }
}
