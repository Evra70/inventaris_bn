@extends('master.master')

@section('page-title', 'Daftar PeminjamanBarang')

@section('title','Daftar PeminjamanBarang')

@section('script')
@endsection

@section('header-content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body" style="margin-bottom: -60px;">
                <!-- Card stats -->
                <form action="/search/peminjamanBarangList" method="post">
                    {{csrf_field()}}
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label text-white" for="input-city">Search</label>
                            <input type="text" class="form-control form-control-alternative" autocomplete="off" name="keyword" placeholder="Search...">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" style="margin-top: 30px;" value="Search">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('body-content')
    <div class="row mt-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Table PeminjamanBarang </h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($peminjamanBarangList as $peminjamanBarang)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$peminjamanBarang->fullname}}</td>
                            <td>{{$peminjamanBarang->nama_barang}}</td>
                            <td>{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_pinjam))}}</td>
                            <td>{{$peminjamanBarang->jml_barang}}</td>
                            <td>{{Date('d-m-Y',strtotime($peminjamanBarang->tgl_kembali))}}</td>
                            @if($peminjamanBarang->kondisi == 'N')
                                <td ><label class="btn btn-warning">Belum Kembali</label></td>
                            @else
                                <td ><label class="btn btn-success">Sudah Kembali</label></td>
                            @endif
                            @if($peminjamanBarang->kondisi == 'N' && Auth::guard('administrator')->check())
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="/peminjamanBarang/{{$peminjamanBarang->pinjam_id}}/cancel">Batalkan</a>
                                        <a class="dropdown-item" href="/peminjamanBarang/{{$peminjamanBarang->pinjam_id}}/kembali">Kembalikan</a>
                                        <a class="dropdown-item" href="/menu/editPeminjamanBarangForm/{{$peminjamanBarang->pinjam_id}}">Edit</a>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection