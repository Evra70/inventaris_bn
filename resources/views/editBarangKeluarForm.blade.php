@extends('master.master')

@section('page-title', 'Form Edit Barang Keluar')

@section('title','Edit Barang Keluar')

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
          <h3 class="mb-0 text-center">FORM EDIT BARANG KELUAR</h3>
        </div>
        <div class="card-body">
          <form action="/proses/editBarangKeluarProcess" method="post">
            {{csrf_field()}}
            @if (session('status'))
              <div class="alert alert-danger">
                {{ session('status') }}
              </div>
            @endif
            <input type="hidden" name="barang_keluar_id" value="{{$barangKeluar->barang_keluar_id}}">
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-email">Nama Barang</label>
                    <select class="form-control form-control-alternative" name="barang_id">
                      <option value="{{$barangSelected->barang_id}}">{{$barangSelected->nama_barang}}</option>
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
                  <div class="form-group {{ $errors->has('jml_keluar') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Jumlah Keluar</label>
                    <input type="number" min="1" autocomplete="off" id="input-username" value="{{$barangKeluar->jml_keluar}}" class="form-control form-control-alternative" placeholder="Jumlah Keluar..." name="jml_keluar">
                  </div>
                  @if ($errors->has('jml_keluar'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('jml_keluar') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Lokasi</label>
                    <input type="text"  autocomplete="off" id="input-username" value="{{$barangKeluar->lokasi}}" class="form-control form-control-alternative" placeholder="Lokasi..." name="lokasi">
                  </div>
                  @if ($errors->has('lokasi'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('penerima') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Penerima</label>
                    <input type="text"  autocomplete="off" id="input-username" value="{{$barangKeluar->penerima}}" class="form-control form-control-alternative" placeholder="Penerima..." name="penerima">
                  </div>
                  @if ($errors->has('penerima'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('penerima') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <hr class="my-4" />
              <div class="row">
                <div class="col-lg-6">
                  <input type="submit" value="Edit" class="btn btn-info">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection