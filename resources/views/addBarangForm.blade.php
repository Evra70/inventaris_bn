@extends('master.master')

@section('page-title', 'Form Tambah Barang')

@section('title','Tambah Barang')

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
          <h3 class="mb-0 text-center">FORM TAMBAH BARANG</h3>
        </div>
        <div class="card-body">
          <form action="/proses/addBarangProcess" method="post">
            {{csrf_field()}}
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-email">Nama Barang</label>
                    <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" placeholder="Nama Barang..."  name="nama_barang">
                </div>
                  @if ($errors->has('nama_barang'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </span>
                  @endif
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('spesifikasi') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Spesifikasi</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Spesifikasi..." name="spesifikasi">
                  </div>
                  @if ($errors->has('spesifikasi'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('spesifikasi') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Lokasi</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Lokasi..." name="lokasi">
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
                  <div class="form-group {{ $errors->has('kondisi') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Kondisi</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Kondisi..." name="kondisi">
                  </div>
                  @if ($errors->has('kondisi'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('kondisi') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('sumber_dana') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Sumber Dana</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Sumber Dana..." name="sumber_dana">
                  </div>
                  @if ($errors->has('sumber_dana'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('sumber_dana') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('jumlah_barang') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Jumlah Barang</label>
                    <input type="number" min="0" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Jumlah Barang..." name="jumlah_barang">
                  </div>
                  @if ($errors->has('jumlah_barang'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('jumlah_barang') }}</strong>
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