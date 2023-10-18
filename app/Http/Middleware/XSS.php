<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XSS
{

    protected $except = [
        'admin/profile/settings/account/update',
        'admin/user/store',
        'admin/user/update',
        'admin/todo/store',
        'admin/todo/update*',
        'admin/settings/general-settings/update',
        'admin/settings/mail-settings/update'
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!request()->is($this->except)){
            $input = $request->all();
            array_walk_recursive($input, function(&$input){
                $input = strip_tags($input);
            });
            $request->merge($input);
        }

        return $next($request);
    }
}
