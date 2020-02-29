<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
        
        if(isset(auth()->user()->id)){
            if(auth()->user()->admin !==1){
                return redirect('/');
            }
        }else{
            return redirect('/login');
        }
        return $next($request);


    }
}
