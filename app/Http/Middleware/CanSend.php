<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanSend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->canSendApplication()) :
            return $next($request);
        else :
            return redirect('/')->with('status', 'Application can be sent once a day.');
        endif;
    }
}
