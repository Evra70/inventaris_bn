<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangMasuk;
use App\Stok;
use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
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
    public function deleteBarangMasuk($barangMasukId){
        $barangMasuk = BarangMasuk::find($barangMasukId);

        $stok = Stok::find($barangMasuk->barang_id);
        $stok->jml_masuk -= $barangMasuk->jml_masuk;
        $stok->total_barang -= $barangMasuk->jml_masuk;
        $stok->save();

        $barangMasuk->delete();
        return redirect('/menu/barangMasukList');
    }

    public function addBarangMasukForm(){
        $barangList=Barang::all();
        $suplierList=Suplier::all();
        return view('addBarangMasukForm',['barangList'=>$barangList,'suplierList'=>$suplierList]);
    }

    public function editBarangMasukForm($barang_masuk_id){
        $barangList=Barang::all();
        $suplierList=Suplier::all();

        $barangMasuk = DB::select("SELECT * FROM t_barang_masuk WHERE barang_masuk_id='$barang_masuk_id'");

        $suplierSelected = Suplier::find($barangMasuk[0]->suplier_id);
        $barangSelected = Barang::find($barangMasuk[0]->barang_id);
        return view('editBarangMasukForm',
            ['barangMasuk'=>$barangMasuk[0],
            'barangList'=>$barangList,
            'suplierList'=>$suplierList,
            'suplierSelected'=>$suplierSelected,
            'barangSelected'=>$barangSelected]);
    }

    public function getBarangMasukList()
    {
        $barangMasukList = DB::select("SELECT A.*, C.nama_suplier FROM t_barang_masuk A 
                                      INNER JOIN t_suplier C ON A.suplier_id = C.suplier_id
                                      ORDER BY A.barang_masuk_id DESC ");
        return view('barangMasukList',['barangMasukList' => $barangMasukList]);
    }

    public function getBarangMasukListSearch(Request $request)
    {
        $key=$request->keyword;
        $barangMasukList = DB::select("SELECT A.*,B.* FROM t_barang_masuk A
                        INNER JOIN t_suplier B ON A.suplier_id = B.suplier_id
                        WHERE UPPER(A.nama_barang) LIKE UPPER('%".$key."%') OR 
                        UPPER(B.nama_suplier) LIKE UPPER('%".$key."%')");
        return view('barangMasukList',['barangMasukList' => $barangMasukList]);
    }

    public function addBarangMasukProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_masuk'    => 'required|numeric|min:1',
            'suplier_id'    => 'required',
        ]);

            $barang = Barang::find($request->barang_id);

            $barangMasuk = new BarangMasuk();
            $barangMasuk->barang_id     = $request->barang_id;
            $barangMasuk->nama_barang   = $barang->nama_barang;
            $barangMasuk->tgl_masuk     = Date('Ymd');
            $barangMasuk->jml_masuk     = $request->jml_masuk;
            $barangMasuk->suplier_id    = $request->suplier_id;
            $barangMasuk->save();

            $datastok = Stok::find($request->barang_id);
            $jumlahMasuk = $datastok["jml_masuk"]+$request->jml_masuk;
            $totalBarang = $datastok["total_barang"]+$request->jml_masuk;

            $stok=Stok::find($request->barang_id);
            $stok->jml_masuk = $jumlahMasuk;
            $stok->total_barang = $totalBarang;
            $stok->save();

            return redirect('/menu/barangMasukList');

    }

    public function editBarangMasukProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_masuk'    => 'required|numeric|min:1',
            'suplier_id'    => 'required',
        ]);

            $barangMasuk = BarangMasuk::find($request->barang_masuk_id);
            $barang = Barang::find($request->barang_id);

            if($barangMasuk->barang_id != $request->barang_id){

                $stokLama = Stok::find($barangMasuk->barang_id);
                $jmlLama = $stokLama->jml_masuk - $barangMasuk->jml_masuk;
                $totalLama = $stokLama->total_barang - $barangMasuk->jml_masuk;
                $stokLama->jml_masuk = $jmlLama;
                $stokLama->total_barang = $totalLama;
                $stokLama->save();

                $barangMasuk->barang_id     = $request->barang_id;
                $barangMasuk->nama_barang   = $barang->nama_barang;
                $barangMasuk->tgl_masuk     = Date('Ymd');
                $barangMasuk->jml_masuk     = $request->jml_masuk;
                $barangMasuk->suplier_id    = $request->suplier_id;
                $barangMasuk->save();

                $datastok = Stok::find($request->barang_id);
                $jumlahMasuk = $datastok["jml_masuk"]+$request->jml_masuk;
                $totalBarang = $datastok["total_barang"]+$request->jml_masuk;

                $stok=Stok::find($request->barang_id);
                $stok->jml_masuk = $jumlahMasuk;
                $stok->total_barang = $totalBarang;
                $stok->save();
            }else{

                $stok = Stok::find($barangMasuk->barang_id);
                $jmlLama = ($stok->jml_masuk - $barangMasuk->jml_masuk)+$request->jml_masuk;
                $totalLama = ($stok->total_barang - $barangMasuk->jml_masuk)+$request->jml_masuk;
                $stok->jml_masuk = $jmlLama;
                $stok->total_barang = $totalLama;
                $stok->save();

                $barangMasuk->tgl_masuk     = Date('Ymd');
                $barangMasuk->jml_masuk     = $request->jml_masuk;
                $barangMasuk->suplier_id    = $request->suplier_id;
                $barangMasuk->save();
            }

            return redirect('/menu/barangMasukList');
    }

}
