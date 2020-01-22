@extends('master.master')

@section('page-title', 'Daftar Barang Masuk')

@section('title','Daftar Barang Masuk')

@section('script')
@endsection

@section('header-content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body" style="margin-bottom: -60px;">
                <!-- Card stats -->
                <form action="/search/barangMasukList" method="post">
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
                    <h3 class="mb-0">Table Barang Masuk @if(Auth::guard('administrator')->check())<a href="/menu/addBarangMasukForm" class="btn btn-success" style="float: right;">+ Tambah</a> @endif</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Jumlah Masuk</th>
                            <th scope="col">Nama Suplier</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($barangMasukList as $barangMasuk)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$barangMasuk->nama_barang}}</td>
                            <td>{{Date('d-m-Y',strtotime($barangMasuk->tgl_masuk))}}</td>
                            <td>{{$barangMasuk->jml_masuk}}</td>
                            <td>{{$barangMasuk->nama_suplier}}</td>
                            @if(Auth::guard('administrator')->check())
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" onclick="confirm('Apakah Yakin Ingin Menghapus Data ?');" href="/barangMasuk/{{$barangMasuk->barang_masuk_id}}/delete">Delete</a>
                                        <a class="dropdown-item" href="/menu/editBarangMasukForm/{{$barangMasuk->barang_masuk_id}}">Edit</a>
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