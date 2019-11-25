<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
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
    public function deleteBarang($barangId){
        Barang::find($barangId)->delete();
        Stok::find($barangId)->delete();
        return redirect('/menu/barangList');
    }

    public function addBarangForm(){
        return view('addBarangForm');
    }

    public function editBarangForm($barang_id){
        $barang = DB::select("SELECT A.*,B.* FROM t_barang A
                      INNER JOIN t_stok B ON A.barang_id = B.barang_id
                      WHERE A.barang_id='$barang_id'");;
        return view('editBarangForm',['barang'=>$barang[0]]);
    }

    public function getBarangList()
    {
        $barangList = DB::select("SELECT A.*,B.* FROM t_barang A
                      INNER JOIN t_stok B ON A.barang_id = B.barang_id");
        return view('barangList',['barangList' => $barangList]);
    }

    public function getBarangListSearch(Request $request)
    {
        $key=$request->keyword;
        $barangList = DB::select("SELECT A.*,B.* FROM t_barang A
                        INNER JOIN t_stok B ON A.barang_id = B.barang_id
                        WHERE UPPER(nama_barang) LIKE UPPER('%".$key."%') OR 
                        UPPER(spesifikasi) LIKE UPPER('%".$key."%') OR 
                        UPPER(lokasi) LIKE UPPER('%".$key."%') OR 
                        UPPER(sumber_dana) LIKE UPPER('%".$key."%') OR 
                        UPPER(kondisi) LIKE UPPER('%".$key."%')");
        return view('barangList',['barangList' => $barangList]);
    }

    public function addBarangProcess(Request $request)
    {
        $this->validate($request,[
            'nama_barang'      => 'required|min:3|max:50',
            'spesifikasi'    => 'required|min:3|max:30',
            'lokasi'    => 'required|min:5|max:30',
            'kondisi'    => 'required|min:5|max:30',
            'sumber_dana'      => 'required|min:5|max:20',
            'jumlah_barang'      => 'required|numeric',
        ]);

            $barang = new Barang();
            $barang->nama_barang      = $request->nama_barang;
            $barang->spesifikasi    = $request->spesifikasi;
            $barang->lokasi    = $request->lokasi;
            $barang->kondisi    = $request->kondisi;
            $barang->sumber_dana      = $request->sumber_dana;
            $barang->save();

            $stok = new Stok();
            $stok->barang_id    = $barang->barang_id;
            $stok->jml_masuk    = 0;
            $stok->jml_keluar   = 0;
            $stok->jml_pinjam   = 0;
            $stok->total_barang = $request->jumlah_barang;
            $stok->save();

            return redirect('/menu/barangList');

    }

    public function editBarangProcess(Request $request)
    {
        $this->validate($request,[
            'nama_barang'      => 'required|min:3|max:50',
            'spesifikasi'    => 'required|min:3|max:30',
            'lokasi'    => 'required|min:5|max:30',
            'kondisi'    => 'required|min:5|max:30',
            'sumber_dana'      => 'required|min:5|max:20',
            'jumlah_barang'      => 'required|numeric',
            'jumlah_masuk'      => 'required|numeric',
            'jumlah_keluar'      => 'required|numeric',
        ]);

            $barang = Barang::find($request->barang_id);
            $barang->nama_barang      = $request->nama_barang;
            $barang->spesifikasi    = $request->spesifikasi;
            $barang->lokasi    = $request->lokasi;
            $barang->kondisi    = $request->kondisi;
            $barang->sumber_dana      = $request->sumber_dana;
            $barang->save();

            $stok = Stok::find($request->barang_id);
            $stok->jml_masuk    = $request->jumlah_masuk;
            $stok->jml_keluar   = $request->jumlah_keluar;
            $stok->total_barang = $request->jumlah_barang;
            $stok->save();

            return redirect('/menu/barangList');
    }

}
