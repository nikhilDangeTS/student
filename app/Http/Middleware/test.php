<?php

namespace App\Http\Middleware;

use Closure;
//use App\Http\Middleware\Exception;

class test
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
        $url = $request->url();
        if ($url)
        {
            
        }

        $ip = $request->ip();
        if ($ip == '127.0.0.1')
        {
            throw new \Exception("Your IP is Correct");
        }
        return $next($request);
    }
}
