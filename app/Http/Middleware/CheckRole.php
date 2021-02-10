<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
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

        //User pakolkas nereikia
        //ji atstoja prisijunges vartotojas
        $roles = [
            'admin' => '1',
            //'user' => '2',
        ];

        $roleIds = $roles[$role] ?? '';
        //reik tikrinti ar prisijunges, kitu atveju buna klaida del role_id
        if(Auth::id()){
            //jei prisijunges, patikrinam ar turi teises patekti i puslapi
            if(auth()->user()->role_id != $roleIds){
                abort(403);
            }
        }else{
            abort(403);
        }
        
        return $next($request);
    }
}
