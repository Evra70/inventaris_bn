<?php

namespace App\Http\Controllers;

use App\BarangKeluar;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{



    public function reportBarangListPdf(){
        $barangList = DB::select("SELECT A.*,B.* FROM t_barang A
                      INNER JOIN t_stok B ON A.barang_id = B.barang_id");

        $date = Date('Y_m_d');
        $pdf = PDF::loadView('report.reportBarangPdf',['barangList'=>$barangList]);
        return $pdf->stream($date."_report_barang_pdf_".Auth::user()->fullname.".pdf");
    }

    public function reportBarangKeluarListPdf(){
        $barangKeluarList = BarangKeluar::orderByDesc('barang_keluar_id')->get();

        $date = Date('Y_m_d');
        $pdf = PDF::loadView('report.reportBarangKeluarPdf',['barangKeluarList'=>$barangKeluarList]);
        return $pdf->stream($date."_report_barang_keluar_pdf_".Auth::user()->fullname.".pdf");
    }

    public function reportBarangMasukListPdf(){
        $barangMasukList = DB::select("SELECT A.*, C.nama_suplier FROM t_barang_masuk A 
                                      INNER JOIN t_suplier C ON A.suplier_id = C.suplier_id
                                      ORDER BY A.barang_masuk_id DESC ");
        $date = Date('Y_m_d');
        $pdf = PDF::loadView('report.reportBarangMasukPdf',['barangMasukList'=>$barangMasukList]);
        return $pdf->stream($date."_report_barang_masuk_pdf_".Auth::user()->fullname.".pdf");
    }

    public function reportPeminjamanBarangListPdf(){
        $peminjamanBarangList = DB::select("SELECT A.*, B.fullname, C.nama_barang FROM t_pinjam_barang A 
                                      INNER JOIN t_user B ON B.user_id = A.peminjam_id
                                      INNER JOIN t_barang C ON C.barang_id = A.barang_id
                                      ORDER BY A.pinjam_id DESC ");
        $date = Date('Y_m_d');
        $pdf = PDF::loadView('report.reportPeminjamanBarangPdf',['peminjamanBarangList'=>$peminjamanBarangList]);
        return $pdf->stream($date."_report_peminjaman_barang_pdf_".Auth::user()->fullname.".pdf");
    }
}
