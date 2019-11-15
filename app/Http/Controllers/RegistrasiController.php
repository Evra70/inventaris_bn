<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function registrasi(Request $request){
        $this->validate($request,[
            'fullname' => 'required|min:7|max:50',
            'username' => 'required|min:5|max:20',
            'password' => 'required|min:6'
        ]);

        $user = User::where('username',$request->username)->first();
        if(isset($user)){
        }else{
            $user = new User();
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->level    = 'administrator';
            $user->password = md5($request->password);
            $user->save();
            Auth::guard("administrator")->LoginUsingId($user['user_id']);
            return redirect('/administrator');
        }
    }

}
