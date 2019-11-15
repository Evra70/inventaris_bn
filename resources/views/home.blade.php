@extends('master.master')

@section('page-title', 'Home')

@section('title','Home')

@section('script')
@endsection

@section('content')
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <h3 class="mb-0 text-center">INVENTARIS BN</h3>
        </div>
        <div class="card-body">
          <h1 style="text-align: center;">Selamat Datang {{Auth::user()->fullname}}!!!</h1>
          <ol>
            <li>Aplikasi yang Berguna untuk Membantu Inventaris</li>
            <li>Menggunakan Sistem Multi User</li>
            <li>Peminjam Hanya Bisa Meminjam Barang</li>
            <li>Manajemen Melihat Hasil Laporan</li>
            <li>Sistem Dikelola Oleh Administrator </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
@endsection