<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function index(){
        $adminCheck = DB::select("SELECT 1 FROM t_user");
        return view("auth.login",['asAdmin' => $adminCheck]);
    }
    public function masuk(Request $request){
        $this->validate($request,[
            'username' => 'required|min:5|max:20',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = md5($request->password);
        $user = User::where('username',$username)
            ->where('password',$password)->first();
        if(isset($user)){
            $level=$user->level;
            Auth::guard("$level")->LoginUsingId($user['user_id']);
            return redirect("/$level");
        }else{
            $alert = "danger";
            $status = "Anda Gagal Login ! ";
            return $this->redirectWithStatus($alert,$status);
        }

    }

    private function redirectWithStatus($alert,$status){
        return redirect('/')->with('status', "$status")->with('proses',"$alert");
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
