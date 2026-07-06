<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckForPrice
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
        if (
            $request->url('hotels/pay') or $request->url('hotels/success')) {
            if (Session::get('price') == 0) {
                return abort('403');
            }
        }
        return $next($request);
    }
}
