<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangKeluar;
use App\Stok;
use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
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
    public function deleteBarangKeluar($barangKeluarId){
        $barangKeluar = BarangKeluar::find($barangKeluarId);

        $stok = Stok::find($barangKeluar->barang_id);
        $stok->jml_masuk -= $barangKeluar->jml_masuk;
        $stok->total_barang -= $barangKeluar->jml_masuk;
        $stok->save();

        $barangKeluar->delete();
        return redirect('/menu/barangKeluarList');
    }

    public function addBarangKeluarForm(){
        $barangList=Barang::all();
        return view('addBarangKeluarForm',['barangList'=>$barangList    ]);
    }

    public function editBarangKeluarForm($barang_masuk_id){
        $barangList=Barang::all();
        $suplierList=Suplier::all();

        $barangKeluar = DB::select("SELECT * FROM t_barang_masuk WHERE barang_masuk_id='$barang_masuk_id'");

        $suplierSelected = Suplier::find($barangKeluar[0]->suplier_id);
        $barangSelected = Barang::find($barangKeluar[0]->barang_id);
        return view('editBarangKeluarForm',
            ['barangKeluar'=>$barangKeluar[0],
            'barangList'=>$barangList,
            'suplierList'=>$suplierList,
            'suplierSelected'=>$suplierSelected,
            'barangSelected'=>$barangSelected]);
    }

    public function getBarangKeluarList()
    {
        $barangKeluarList = BarangKeluar::orderByDesc('barang_keluar_id')->get();
        return view('barangKeluarList',['barangKeluarList' => $barangKeluarList]);
    }

    public function getBarangKeluarListSearch(Request $request)
    {
        $key=$request->keyword;
        $barangKeluarList = DB::select("SELECT A.*,B.* FROM t_barang_masuk A
                        INNER JOIN t_suplier B ON A.suplier_id = B.suplier_id
                        WHERE UPPER(A.nama_barang) LIKE UPPER('%".$key."%') OR 
                        UPPER(B.nama_suplier) LIKE UPPER('%".$key."%')");
        return view('barangKeluarList',['barangKeluarList' => $barangKeluarList]);
    }

    public function addBarangKeluarProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_keluar'    => 'required|numeric|min:1',
            'lokasi'    => 'required|min:4|max:30',
            'penerima'    => 'required|min:4|max:20',
        ]);

            $barang = Barang::find($request->barang_id);

            $barangKeluar = new BarangKeluar();
            $barangKeluar->barang_id     = $request->barang_id;
            $barangKeluar->nama_barang   = $barang->nama_barang;
            $barangKeluar->tgl_keluar     = Date('Ymd');
            $barangKeluar->jml_keluar     = $request->jml_keluar;
            $barangKeluar->lokasi    = $request->lokasi;
            $barangKeluar->penerima    = $request->penerima;
            $barangKeluar->save();

            $datastok = Stok::find($request->barang_id);
            $jumlahKeluar = $datastok["jml_keluar"]+$request->jml_keluar;
            $totalBarang = $datastok["total_barang"]-$request->jml_keluar;

            $stok=Stok::find($request->barang_id);
            $stok->jml_keluar = $jumlahKeluar;
            $stok->total_barang = $totalBarang;
            $stok->save();

            return redirect('/menu/barangKeluarList');

    }

    public function editBarangKeluarProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_masuk'    => 'required|numeric|min:1',
            'suplier_id'    => 'required',
        ]);

            $barangKeluar = BarangKeluar::find($request->barang_masuk_id);
            $barang = Barang::find($request->barang_id);

            if($barangKeluar->barang_id != $request->barang_id){

                $stokLama = Stok::find($barangKeluar->barang_id);
                $jmlLama = $stokLama->jml_masuk - $barangKeluar->jml_masuk;
                $totalLama = $stokLama->total_barang - $barangKeluar->jml_masuk;
                $stokLama->jml_masuk = $jmlLama;
                $stokLama->total_barang = $totalLama;
                $stokLama->save();

                $barangKeluar->barang_id     = $request->barang_id;
                $barangKeluar->nama_barang   = $barang->nama_barang;
                $barangKeluar->tgl_masuk     = Date('Ymd');
                $barangKeluar->jml_masuk     = $request->jml_masuk;
                $barangKeluar->suplier_id    = $request->suplier_id;
                $barangKeluar->save();

                $datastok = Stok::find($request->barang_id);
                $jumlahMasuk = $datastok["jml_masuk"]+$request->jml_masuk;
                $totalBarang = $datastok["total_barang"]+$request->jml_masuk;

                $stok=Stok::find($request->barang_id);
                $stok->jml_masuk = $jumlahMasuk;
                $stok->total_barang = $totalBarang;
                $stok->save();
            }else{

                $stok = Stok::find($barangKeluar->barang_id);
                $jmlLama = ($stok->jml_masuk - $barangKeluar->jml_masuk)+$request->jml_masuk;
                $totalLama = ($stok->total_barang - $barangKeluar->jml_masuk)+$request->jml_masuk;
                $stok->jml_masuk = $jmlLama;
                $stok->total_barang = $totalLama;
                $stok->save();

                $barangKeluar->tgl_masuk     = Date('Ymd');
                $barangKeluar->jml_masuk     = $request->jml_masuk;
                $barangKeluar->suplier_id    = $request->suplier_id;
                $barangKeluar->save();
            }

            return redirect('/menu/barangKeluarList');
    }

}
