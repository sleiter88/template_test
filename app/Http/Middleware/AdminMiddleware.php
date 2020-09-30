<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-12 04:16:41
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-12 04:16:47
 */

namespace App\Http\Middleware;

use Closure;

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
        if (auth()->check() && ((auth()->user()->role == 'Admin') || auth()->user()->role == 'Super Admin'))
            return $next($request);

        return redirect('login');
    }
}
