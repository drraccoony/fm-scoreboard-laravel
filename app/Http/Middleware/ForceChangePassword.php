<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForceChangePassword
{
    /**
     * Check to see if the user's password_reset flag is true, if so redirect them to change their password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->password_reset == 1) {
                return redirect()->route('password.change-show')->with(['message' => 'Your password has been reset, please make a new one to continue.']);
        }

        return $next($request);
    }
}
