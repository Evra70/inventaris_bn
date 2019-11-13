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
        $this->validate($request,[
            'username' => 'required|min:5|max:20',
            'password' => 'required'
        ]);
        $username = $request->username;
        $password = md5($request->password);
        $user = User::where('username',$username)
            ->where('password',$password)->first();
        if(isset($user)){
            if ($user->active == 'D'){
                $alert = "info";
                $status = "Akun Belum Di Setujui Administrator !";
               return $this->redirectWithStatus($alert,$status);
            }else{
                $level=$user->level;
                Auth::guard("$level")->LoginUsingId($user['user_id']);
                return redirect("/$level");
            }
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
