<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types): Response
    {
        /**
        *@var User $user
        */        
        $user = auth()->user();
        if(in_array($user->user_type,$types)){
            return $next($request);
        } else {
            abort(Response::HTTP_UNAUTHORIZED,__('UNAUTHORIZED!'));
        }
    }
}
