<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\Models\User;
use App\Models\Place_User;
use App\Models\Place;

use Hash;
use Cookie;

class HostLoginController extends Controller
{
    public function __construct()
    {

    }
    public function getIndex(){
        if(!session()->has('s_host_id'))
            return view('host.login');
        else
            return redirect()->to('_host/');
    }
    public function postForm(Request $request){
        $data = User::join('user_place', 'user.user_id', '=', 'user_place.user_id')->
        join('place', 'user_place.place_id', '=', 'place.place_id')->where('email',$request->email)->first();
       

        if(empty($data))
            return redirect()->back()->with(['error','ไม่มีชื่อผู้ใช้งานนี้ในระบบค่ะ']);
        if(!Hash::check($request->password,$data->password))
            return redirect()->back()->with(['error','ระหัสผ่านไม่ถูกต้องค่ะ']);

        $remember_me = $request->remember;
        session()->put('s_host_id',$data->admin_id);
        session()->put('s_host_name',$data->firstname.' '.$data->lastname);
        session()->put('s_host_email',$data->email);
        session()->put('s_host_department_id',$data->department_id);

        if($remember_me == 1){
            Cookie::queue('c_host_id',$data->user_id,525600);
        }else{
            Cookie::queue(Cookie::forget('c_host_id'));
        }
        return redirect()->to('_host');
    }


    public function logout(){
        session()->flush();
        Cookie::queue(Cookie::forget('c_host_id'));

        return redirect()->to('_host/login');
    }
}