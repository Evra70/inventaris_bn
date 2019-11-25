<?php

namespace App\Http\Controllers;

use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuplierController extends Controller
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
    public function deleteSuplier($suplierId){
        Suplier::find($suplierId)->delete();
        return redirect('/menu/suplierList');
    }

    public function addSuplierForm(){
        return view('addSuplierForm');
    }

    public function editSuplierForm($suplier_id){
        $suplier = Suplier::find($suplier_id);
        return view('editSuplierForm',['suplier'=>$suplier]);
    }

    public function getSuplierList()
    {
        $suplierList = Suplier::all();
        return view('suplierList',['suplierList' => $suplierList]);
    }

    public function getSuplierListSearch(Request $request)
    {
        $key=$request->keyword;
        $suplierList = DB::select("SELECT * FROM t_suplier WHERE UPPER(nama_suplier) LIKE UPPER('%".$key."%') OR 
                    UPPER(alamat_suplier) LIKE UPPER('%".$key."%') OR UPPER(telp_suplier) LIKE UPPER('%".$key."%')");
        return view('suplierList',['suplierList' => $suplierList]);
    }

    public function addSuplierProcess(Request $request)
    {
        $this->validate($request,[
            'nama_suplier'      => 'required|min:7|max:50',
            'alamat_suplier'    => 'required|min:5',
            'telp_suplier'      => 'required|numeric',
        ]);

            $suplier = new Suplier();
            $suplier->nama_suplier      = $request->nama_suplier;
            $suplier->alamat_suplier    = $request->alamat_suplier;
            $suplier->telp_suplier      = $request->telp_suplier;
            $suplier->save();

            return redirect('/menu/suplierList');

    }

    public function editSuplierProcess(Request $request)
    {
        $this->validate($request,[
            'nama_suplier'      => 'required|min:7|max:50',
            'alamat_suplier'    => 'required|min:5',
            'telp_suplier'      => 'required|numeric',
        ]);

            $suplier = Suplier::find($request->suplier_id);
            $suplier->nama_suplier      = $request->nama_suplier;
            $suplier->alamat_suplier    = $request->alamat_suplier;
            $suplier->telp_suplier      = $request->telp_suplier;
            $suplier->save();
            return redirect('/menu/suplierList');
    }

}
