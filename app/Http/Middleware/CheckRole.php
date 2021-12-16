<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $authuser=auth()->user();
        $roleid=$authuser->role;
        $permissions=config('myblog');
        foreach ($permissions[$roleid] as $value)
        {
            Gate::define($value,function (User $user) use($roleid){
                return $user->role==$roleid;
            });
        }
        return $next($request);
    }
}
