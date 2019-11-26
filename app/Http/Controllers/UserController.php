<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function deleteUser($userId){
        User::find($userId)->delete();
        return redirect('/menu/userList');
    }

    public function addUserForm(){
        return view('addUserForm');
    }

    public function editUserForm($user_id){
        $user = User::find($user_id);
        return view('editUserForm',['user'=>$user]);
    }

    public function getUserList()
    {
        $userList = User::all();
        return view('userList',['userList' => $userList]);
    }

    public function getUserListSearch(Request $request)
    {
        $key=$request->keyword;
        $userList = DB::select("SELECT * FROM t_user WHERE UPPER(fullname) LIKE UPPER('%".$key."%') OR 
                    UPPER(username) LIKE UPPER('%".$key."%') OR UPPER(level) LIKE UPPER('%".$key."%')");
        return view('userList',['userList' => $userList]);
    }

    public function addUserProcess(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required|min:4|max:50',
            'username' => 'required|min:5|max:20',
            'level'    => 'required',
            'password' => 'required|min:6'
        ]);

        $user = User::where('username',$request->username)->first();
        if(isset($user)){
            return redirect()->back()->with('status','Username Telah Terdaftar !!!');
        }else{
            $user = new User();
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->level    = $request->level;;
            $user->password = md5($request->password);
            $user->save();
            return redirect('/menu/userList');
        }

    }

    public function editUserProcess(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required|min:4|max:50',
            'username' => 'required|min:5|max:20',
            'level'    => 'required',
            'password' => 'required|min:6'
        ]);

        $user = User::where('username',$request->username)->first();
        if(isset($user) && $request->username != $request->username_before){
            return redirect()->back()->with('status','Username Telah Terdaftar !!!');
        }else{
            $user = User::find($request->user_id);
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->level    = $request->level;;
            $user->password = md5($request->password);
            $user->save();
            return redirect('/menu/userList');
        }

    }

}
