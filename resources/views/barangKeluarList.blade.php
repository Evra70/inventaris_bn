@extends('master.master')

@section('page-title', 'Daftar Barang Keluar')

@section('title','Daftar Barang Keluar')

@section('script')
@endsection

@section('header-content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body" style="margin-bottom: -60px;">
                <!-- Card stats -->
                <form action="/search/barangKeluarList" method="post">
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
                    <h3 class="mb-0">Table Barang Keluar
                        @if(Auth::guard('administrator')->check())
                            <a href="/menu/addBarangKeluarForm" class="btn btn-success" style="float: right;">+ Tambah</a></h3>
                        @endif
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col">Jumlah Keluar</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Penerima</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                        @foreach($barangKeluarList as $barangKeluar)
                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$barangKeluar->nama_barang}}</td>
                            <td>{{Date('d-m-Y',strtotime($barangKeluar->tgl_keluar))}}</td>
                            <td>{{$barangKeluar->jml_keluar}}</td>
                            <td>{{$barangKeluar->lokasi}}</td>
                            <td>{{$barangKeluar->penerima}}</td>
                            @if(Auth::guard('administrator')->check())
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" onclick="confirm('Apakah Yakin Ingin Menghapus Data ?');" href="/barangKeluar/{{$barangKeluar->barang_keluar_id}}/delete">Delete</a>
                                        <a class="dropdown-item" href="/menu/editBarangKeluarForm/{{$barangKeluar->barang_keluar_id}}">Edit</a>
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