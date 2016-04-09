<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if( ! Auth::check())
        {
            return redirect('/admin/login')
                        ->with('authMessage', 'Must be logged in to access this.');
        }
        else
        {
            // this logic will change once more features are available
            if( ! Auth::user()->admin)
                return redirect('/admin')
                            ->with('authMessage', 'Must be an administrator to access this feature.');
        }

        return $next($request);
    }
}
