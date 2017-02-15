<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

use Cookie;

class HostLogin
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
        $c_host_id = Cookie::get('c_host_id');
        $s_host_id = session()->get('s_host_id');
        if(empty($s_host_id) && empty($c_host_id)) {
            return redirect()->to('_host/login');
        }
        if(empty($s_host_id) && !empty($c_host_id) ){
            $data = User::find($c_host_id);
            if(empty($data)){
                return redirect()->to('_host/login');
            } else {
                session()->put('s_host_id',$data->user_id);
                session()->put('s_host_name',$data->firstname.' '.$data->lastname);
                session()->put('s_host_email',$data->email);
            }
        }
        return $next($request);
    }
}
