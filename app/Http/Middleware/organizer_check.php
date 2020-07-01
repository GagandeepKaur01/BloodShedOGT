<?php

namespace App\Http\Middleware;

use Closure;
use App\registration;
use Session;

class organizer_check
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
        if (!Session::get('login_email')) {
            session()->flash('login_required', 'You need to login');
            return redirect('/');
        } else {
            $check_email_verify = registration::where(['email' => Session::get('login_email')])->first();

            if ($check_email_verify->user_type == 'user') {
                return redirect('/');
            } else {
                return $next($request);
            }
        }
    }
}
