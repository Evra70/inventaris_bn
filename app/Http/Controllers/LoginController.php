<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('auth.login');
    }
    public function masuk(Request $request){
        $username = $request->username;
        $password = md5($request->password);
        $user = User::where('username',$username)->where('password',$password)->first();
        if(isset($user)){
            $level=$user->level;
            Auth::guard("$level")->LoginUsingId($user['user_id']);
            return redirect("/$level");
        }else{
            return $user." | ".$username." | ".$password;
        }

    }

    public function keluar(){
        if(Auth::guard('administrator')->check()){
            Auth::guard('administrator')->logout();
        }else if(Auth::guard('manajemen')->check()){
            Auth::guard('manajemen')->logout();
        }else if(Auth::guard('peminjam')->check()){
            Auth::guard('peminjam')->logout();
        }
        return redirect('/');
    }
}
