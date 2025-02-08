<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next,string $route_role): Response
    // {
    //     echo "<h3 class='text-primary'>We are now in ValidUser Middleware.</h3>";
    //     echo "<h3 class='text-primary'>".Auth::user()->role."</h3>";
    //      if(Auth::check() && Auth::user()->role == $route_role){
    //         return $next($request);

    //     }else{
    //         return redirect()->route('login');
    //     }
    // }

    // when need multipe  role value pass by route
    public function handle(Request $request, Closure $next, ...$route_roles): Response
    {
        $user = Auth::user();
        echo "<h3 class='text-primary'>We are now in ValidUser Middleware.</h3>";
        echo "<h3 class='text-primary'>".Auth::user()->role."</h3>";
         if(Auth::check() && in_array($user->role, $route_roles)){
            return $next($request);

        }else{
            return redirect()->route('login');
        }
    }

    // after complete the request then its run
    // public function terminate(Request $request, Response $response): Void
    // {
    //     echo "<h3 class='text-danger'>We are now in terminateing ValidUser Middleware.</h3>";

    // }
}
