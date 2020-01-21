<?php

namespace App\Http\Controllers;

use App\Barang;
use App\BarangMasuk;
use App\PinjamBarang;
use App\Stok;
use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanBarangController extends Controller
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

    public function pengembalianBarang($pinjamId){
        $pinjamBarang = PinjamBarang::find($pinjamId);
        $stok = Stok::find($pinjamBarang->barang_id);

        $stok->jml_pinjam -= $pinjamBarang->jml_barang;
        $stok->total_barang += $pinjamBarang->jml_barang;
        $stok->save();

        $pinjamBarang->kondisi = 'Y';
        $pinjamBarang->tgl_kembali = Date('Ymd');
        $pinjamBarang->save();
        return redirect('/menu/peminjamanBarangList');
    }

    public function cancelPeminjamanBarang($pinjamId){
        $pinjamBarang = PinjamBarang::find($pinjamId);

        $stok = Stok::find($pinjamBarang->barang_id);
        $stok->jml_pinjam -= $pinjamBarang->jml_barang;
        $stok->total_barang += $pinjamBarang->jml_barang;
        $stok->save();

        $pinjamBarang->delete();
        return redirect('/menu/peminjamanBarangList');
    }

    public function addPeminjamanBarangForm(){
        $barangList=Barang::all();
        return view('addPeminjamanBarangForm',['barangList'=>$barangList]);
    }

    public function editpeminjamanBarangForm($pinjam_id){
        $pinjamBarang = PinjamBarang::where('pinjam_id',$pinjam_id)->first();
        $barangList=Barang::all();
        $barangSelected = Barang::find($pinjamBarang->barang_id);
        return view('editpeminjamanBarangForm',
            ['pinjamBarang'=>$pinjamBarang,
            'barangList'=>$barangList,
            'barangSelected'=>$barangSelected]);
    }

    public function getPeminjamanBarangList()
    {
        $peminjamanBarangList = DB::select("SELECT A.*, B.fullname, C.nama_barang FROM t_pinjam_barang A 
                                      INNER JOIN t_user B ON B.user_id = A.peminjam_id
                                      INNER JOIN t_barang C ON C.barang_id = A.barang_id
                                      ORDER BY A.pinjam_id DESC ");
        return view('peminjamanBarangList',['peminjamanBarangList' => $peminjamanBarangList]);
    }

    public function getPeminjamanBarangListSearch(Request $request)
    {
        $key=$request->keyword;
        $peminjamanBarangList = DB::select("SELECT A.*, B.fullname, C.nama_barang FROM t_pinjam_barang A 
                              INNER JOIN t_user B ON B.user_id = A.peminjam_id
                              INNER JOIN t_barang C ON C.barang_id = A.barang_id
                              WHERE UPPER(C.nama_barang) LIKE UPPER('%".$key."%') OR 
                              UPPER(B.fullname) LIKE UPPER('%".$key."%')
                              ORDER BY A.pinjam_id DESC ");
        return view('peminjamanBarangList',['peminjamanBarangList' => $peminjamanBarangList]);
    }

    public function addPeminjamanBarangProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_barang'    => 'required|numeric|min:1',
        ]);

        $barang = Barang::find($request->barang_id);
        $datastok = Stok::find($request->barang_id);
//        $tglKembali = Date('Ymd',strtotime("+1 week"));
        $tglKembali = "00000000";
        if($datastok["total_barang"] < $request->jml_barang){
            return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
        }else{
            $pinjamBarang = new PinjamBarang();
            $pinjamBarang->barang_id    = $request->barang_id;
            $pinjamBarang->peminjam_id  = Auth::user()->user_id;
            $pinjamBarang->nama_barang  = $barang->nama_barang;
            $pinjamBarang->tgl_pinjam   = Date('Ymd');
            $pinjamBarang->jml_barang   = $request->jml_barang;
            $pinjamBarang->tgl_kembali  = $tglKembali;
            $pinjamBarang->kondisi      = 'N';
            $pinjamBarang->save();

            $jumlahPinjam = $datastok["jml_pinjam"]+$request->jml_barang;
            $totalBarang = $datastok["total_barang"]-$request->jml_barang;

            $stok=Stok::find($request->barang_id);
            $stok->jml_pinjam = $jumlahPinjam;
            $stok->total_barang = $totalBarang;
            $stok->save();
        }
            return redirect('/menu/peminjamanBarangList');
    }

    public function editPeminjamanBarangProcess(Request $request)
    {
        $this->validate($request,[
            'barang_id'      => 'required',
            'jml_barang'    => 'required|numeric|min:1',
            'tgl_kembali'    => 'required',
        ]);

        $pinjamBarang = PinjamBarang::find($request->pinjam_id);
        $barang = Barang::find($request->barang_id);

        $tglKembali = Date('Ymd',strtotime($request->tgl_kembali));

        if($pinjamBarang->barang_id != $request->barang_id){

            $datastok = Stok::find($request->barang_id);
            if($datastok["total_barang"] < $request->jml_barang){
                return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
            }else{
                $stokLama = Stok::find($pinjamBarang->barang_id);
                $jmlLama = $stokLama->jml_pinjam - $pinjamBarang->jml_barang;
                $totalLama = $stokLama->total_barang + $pinjamBarang->jml_barang;
                $stokLama->jml_pinjam = $jmlLama;
                $stokLama->total_barang = $totalLama;
                $stokLama->save();

                $pinjamBarang->barang_id    = $request->barang_id;
                $pinjamBarang->nama_barang  = $barang->nama_barang;
                $pinjamBarang->tgl_pinjam   = Date('Ymd');
                $pinjamBarang->jml_barang   = $request->jml_barang;
                $pinjamBarang->tgl_kembali  = $tglKembali;
                $pinjamBarang->save();

                $jumlahPinjam = $datastok["jml_pinjam"]+$request->jml_barang;
                $totalBarang = $datastok["total_barang"]-$request->jml_barang;

                $stok=Stok::find($request->barang_id);
                $stok->jml_pinjam = $jumlahPinjam;
                $stok->total_barang = $totalBarang;
                $stok->save();
            }
        }else{

            $stok = Stok::find($pinjamBarang->barang_id);
            if($stok["total_barang"] < $request->jml_barang){
                return redirect()->back()->with('status','Stok Barang Tidak Cukup !!!');
            }else{
                $jmlLama = ($stok->jml_pinjam - $pinjamBarang->jml_barang)+$request->jml_barang;
                $totalLama = ($stok->total_barang + $pinjamBarang->jml_barang)-$request->jml_barang;
                $stok->jml_pinjam = $jmlLama;
                $stok->total_barang = $totalLama;
                $stok->save();

                $pinjamBarang->jml_barang   = $request->jml_barang;
                $pinjamBarang->tgl_kembali  = $tglKembali;
                $pinjamBarang->save();
            }
        }

            return redirect('/menu/peminjamanBarangList');
    }

}
