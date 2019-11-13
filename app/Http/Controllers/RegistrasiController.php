<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function registrasi(Request $request){
        $this->validate($request,[
            'fullname' => 'required|min:7|max:50',
            'username' => 'required|min:5|max:20',
            'level' => 'required|min:5|max:20',
            'password' => 'required|min:6'
        ]);
        $user = User::where('username',$request->username)->first();
        if(isset($user)){
            $alert = "danger";
            $status = "Akun dengan username : $request->username sudah terdaftar ! ";
            return $this->redirectWithStatus($alert,$status);
        }else{
            $user = new User();
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->level    = $request->level;
            $user->password = md5($request->password);
            $user->save();
            $alert = "info";
            $status = "Akun Tinggal Menunggu Konfirmasi Administrator ! ";
            return $this->redirectWithStatus($alert,$status);
        }
    }

    private function redirectWithStatus($alert,$status){
        return redirect('/registrasi')->with('status', "$status")->with('proses',"$alert");
    }

}
