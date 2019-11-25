@extends('master.master')

@section('page-title', 'Form Tambah Barang Masuk')

@section('title','Tambah Barang Masuk')

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
          <h3 class="mb-0 text-center">FORM TAMBAH BARANG MASUK</h3>
        </div>
        <div class="card-body">
          <form action="/proses/addBarangMasukProcess" method="post">
            {{csrf_field()}}
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
                  <div class="form-group {{ $errors->has('jml_masuk') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Jumlah Masuk</label>
                    <input type="number" min="1" autocomplete="off" id="input-username" class="form-control form-control-alternative" placeholder="Jumlah Masuk..." name="jml_masuk">
                  </div>
                  @if ($errors->has('jml_masuk'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('jml_masuk') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('suplier_id') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Nama Suplier</label>
                    <select class="form-control form-control-alternative" name="suplier_id">
                      <option value="">--Pilih Suplier--</option>
                      @foreach($suplierList as $suplier)
                        <option value="{{$suplier->suplier_id}}">{{$suplier->nama_suplier}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if ($errors->has('suplier_id'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('suplier_id') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-6">
                  <input type="submit" value="Tambah" class="btn btn-info">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection