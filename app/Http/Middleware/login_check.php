<?php

namespace App\Http\Middleware;

use App\registration;
use Closure;

class login_check
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
        $user_check = registration::where('username', Session::get('username'))->first();

        if (Session::get('username')) {
            if ($user_check == 'user') {
                return $next($request);
            } else {
                return redirect('dashboard');
            }
        } else {
            return redirect('/');
        }
    }
}
