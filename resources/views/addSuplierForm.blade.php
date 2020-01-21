@extends('master.master')

@section('page-title', 'Form Tambah Suplier')

@section('title','Tambah Suplier')

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
          <h3 class="mb-0 text-center">FORM TAMBAH SUPLIER</h3>
        </div>
        <div class="card-body">
          <form action="/proses/addSuplierProcess" method="post">
            {{csrf_field()}}
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('nama_suplier') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-email">Nama Suplier</label>
                    <input type="text" id="input-fullname" autocomplete="off" class="form-control form-control-alternative" placeholder="Nama Suplier..."  name="nama_suplier">
                </div>
                  @if ($errors->has('nama_suplier'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('nama_suplier') }}</strong>
                                    </span>
                  @endif
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('alamat_suplier') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Alamat Suplier</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Alamat..." name="alamat_suplier">
                  </div>
                  @if ($errors->has('alamat_suplier'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('alamat_suplier') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('telp_suplier') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">No Telp.</label>
                    <input type="text" id="input-username" autocomplete="off" class="form-control form-control-alternative" placeholder="Telp..." name="telp_suplier">
                  </div>
                  @if ($errors->has('telp_suplier'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('telp_suplier') }}</strong>
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