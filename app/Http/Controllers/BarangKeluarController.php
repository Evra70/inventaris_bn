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
        $stok->jml_keluar -= $barangKeluar->jml_keluar;
        $stok->total_barang += $barangKeluar->jml_keluar;
        $stok->save();

        $barangKeluar->delete();
        return redirect('/menu/barangKeluarList');
    }

    public function addBarangKeluarForm(){
        $barangList=Barang::all();
        return view('addBarangKeluarForm',['barangList'=>$barangList    ]);
    }

    public function editBarangKeluarForm($barangKeluarId){
        $barangList=Barang::all();

        $barangKeluar = BarangKeluar::where('barang_keluar_id',$barangKeluarId)->first();
        $barangSelected = Barang::find($barangKeluar->barang_id);
        return view('editBarangKeluarForm',
            ['barangKeluar'=>$barangKeluar,
            'barangList'=>$barangList,
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
        $barangKeluarList = DB::select("SELECT A.*,B.* FROM t_barang_keluar A
                        INNER JOIN t_barang B ON A.barang_id = B.barang_id
                        WHERE UPPER(B.nama_barang) LIKE UPPER('%".$key."%') OR 
                        php aUPPER(A.lokasi) LIKE UPPER('%".$key."%') OR 
                        UPPER(A.penerima) LIKE UPPER('%".$key."%')");
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

            $datastok = Stok::find($request->barang_id);
            if($datastok["total_barang"] < $request->jml_keluar){
                return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
            }else{
                $barangKeluar = new BarangKeluar();
                $barangKeluar->barang_id     = $request->barang_id;
                $barangKeluar->nama_barang   = $barang->nama_barang;
                $barangKeluar->tgl_keluar     = Date('Ymd');
                $barangKeluar->jml_keluar     = $request->jml_keluar;
                $barangKeluar->lokasi    = $request->lokasi;
                $barangKeluar->penerima    = $request->penerima;
                $barangKeluar->save();

                $jumlahKeluar = $datastok["jml_keluar"]+$request->jml_keluar;
                $totalBarang = $datastok["total_barang"]-$request->jml_keluar;

                $stok=Stok::find($request->barang_id);
                $stok->jml_keluar = $jumlahKeluar;
                $stok->total_barang = $totalBarang;
                $stok->save();

            }
            return redirect('/menu/barangKeluarList');

    }

    public function editBarangKeluarProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_keluar'    => 'required|numeric|min:1',
            'lokasi'    => 'required|min:4|max:30',
            'penerima'    => 'required|min:4|max:20',
        ]);

            $barangKeluar = BarangKeluar::find($request->barang_keluar_id);
            $barang = Barang::find($request->barang_id);

            if($barangKeluar->barang_id != $request->barang_id){

                $datastok = Stok::find($request->barang_id);
                if($datastok["total_barang"] < $request->jml_keluar){
                    return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
                }else{
                    $stokLama = Stok::find($barangKeluar->barang_id);
                    $jmlLama = $stokLama->jml_keluar - $barangKeluar->jml_keluar;
                    $totalLama = $stokLama->total_barang + $barangKeluar->jml_keluar;
                    $stokLama->jml_keluar = $jmlLama;
                    $stokLama->total_barang = $totalLama;
                    $stokLama->save();

                    $barangKeluar->barang_id    = $request->barang_id;
                    $barangKeluar->nama_barang  = $barang->nama_barang;
                    $barangKeluar->tgl_keluar   = Date('Ymd');
                    $barangKeluar->jml_keluar   = $request->jml_keluar;
                    $barangKeluar->lokasi       = $request->lokasi;
                    $barangKeluar->penerima     = $request->penerima;
                    $barangKeluar->save();

                    $jumlahKeluar = $datastok["jml_keluar"]+$request->jml_keluar;
                    $totalBarang = $datastok["total_barang"]-$request->jml_keluar;

                    $stok=Stok::find($request->barang_id);
                    $stok->jml_keluar = $jumlahKeluar;
                    $stok->total_barang = $totalBarang;
                    $stok->save();
                }
            }else{

                $stok = Stok::find($barangKeluar->barang_id);
                if($stok["total_barang"] < $request->jml_keluar){
                    return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
                }else{
                    $jmlLama = ($stok->jml_keluar - $barangKeluar->jml_keluar)+$request->jml_keluar;
                    $totalLama = ($stok->total_barang + $barangKeluar->jml_keluar)-$request->jml_keluar;
                    $stok->jml_keluar = $jmlLama;
                    $stok->total_barang = $totalLama;
                    $stok->save();

                    $barangKeluar->tgl_keluar     = Date('Ymd');
                    $barangKeluar->jml_keluar     = $request->jml_keluar;
                    $barangKeluar->lokasi       = $request->lokasi;
                    $barangKeluar->penerima     = $request->penerima;
                    $barangKeluar->save();
                }
            }

            return redirect('/menu/barangKeluarList');
    }

}
