<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class ApprovalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
 public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (!auth()->user()->approved) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('Your Account Needs Admin Approval'));
            }
        }

        return $next($request);
    }
}
