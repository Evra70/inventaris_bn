@extends('master.master')

@section('page-title', 'Form Peminjaman Barang')

@section('title','Tambah Peminjaman Barang')

@section('script')
@endsection

@section('header-content')
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
      </div>
    </div>
  </div>
@endsection

@section('body-content')
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <h3 class="mb-0 text-center">FORM PEMINJAMAN BARANG</h3>
        </div>
        <div class="card-body">
          <form action="/proses/addPeminjamanBarangProcess" method="post">
            {{csrf_field()}}
            @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
            @endif
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-email">Nama Barang</label>
                    <select class="form-control form-control-alternative" name="barang_id">
                      <option value="">--Pilih Barang--</option>
                      @foreach($barangList as $barang)
                        <option value="{{$barang->barang_id}}">{{$barang->nama_barang}}</option>
                      @endforeach
                    </select>
                </div>
                  @if ($errors->has('barang_id'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('barang_id') }}</strong>
                                    </span>
                  @endif
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('jml_barang') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Jumlah Barang</label>
                    <input type="number" min="1" autocomplete="off" id="input-username" class="form-control form-control-alternative" placeholder="Jumlah Barang..." name="jml_barang">
                  </div>
                  @if ($errors->has('jml_barang'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('jml_barang') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-6">
                  <input type="submit" value="Pinjam" class="btn btn-info">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection