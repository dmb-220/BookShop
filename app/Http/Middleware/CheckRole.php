<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        //cia reik paprasta if ideti, nes arba admin arba user gali prieiti prie turinio
        $roles = [
            'admin' => '1',
            'user' => '2',
        ];

        $roleIds = $roles[$role] ?? '';

        if(auth()->user()->role_id != $roleIds){
            abort(403);
        }
        return $next($request);
    }
}
