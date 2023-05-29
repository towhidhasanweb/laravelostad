<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   $named = '';
        $checkname = '';
        if(User::where('name', $request->name)->first() != null){
            $named =  User::where('name', $request->name)->first();
            $checkname = $named->name;
        }
        
        
        if($request->name === $checkname){
            return $next($request);
        }
            return response("you can't visit this page");
        
        
    }
}
