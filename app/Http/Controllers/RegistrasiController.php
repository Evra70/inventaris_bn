<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $userCheck = DB::select("SELECT 1 FROM t_user LIMIT 2");
        if(isset($user)){
            return redirect()->back()->with('status','Username Telah Terdaftar !!!');
        }else{
            if(count($userCheck) > 0){
                $user = new User();
                $user->fullname = $request->fullname;
                $user->username = $request->username;
                $user->level    = 'peminjam';
                $user->password = md5($request->password);
                $user->save();
                Auth::guard("peminjam")->LoginUsingId($user['user_id']);
                return redirect('/peminjam');
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

}
