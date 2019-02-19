<?php

namespace App\Http\Middleware;

use Closure;

class ControlSesion
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
        if(!$request->session()->exists('usuario')){
            return redirect()->action('LoginController@index');
        }
        return $next($request);
    }
}
