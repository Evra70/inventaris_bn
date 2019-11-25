@extends('master.master')

@section('page-title', 'Form Tambah User')

@section('title','Tambah User')

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
          <h3 class="mb-0 text-center">FORM TAMBAH USER</h3>
        </div>
        <div class="card-body">
          <form action="/proses/addUserProcess" method="post">
            {{csrf_field()}}
            @if (session('status'))
              <div class="alert alert-info">
                {{ session('status') }}
              </div>
            @endif
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-email">Full Name</label>
                    <input type="text" id="input-fullname" class="form-control form-control-alternative" placeholder="Fullname..."  name="fullname">
                </div>
                  @if ($errors->has('fullname'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                  @endif
              </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username..." name="username">
                  </div>
                  @if ($errors->has('username'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Level</label>
                    <select class="form-control form-control-alternative" name="level">
                      <option>--Pilih Level--</option>
                      <option value="administrator">Administrator</option>
                      <option value="manajemen">Manajemen</option>
                      <option value="peminjam">Peminjam</option>
                    </select>
                  </div>
                  @if ($errors->has('level'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="form-control-label" for="input-username">Password</label>
                    <input type="password" id="input-password" class="form-control form-control-alternative" placeholder="Password..." name="password">
                  </div>
                  @if ($errors->has('password'))
                    <span class="help-block" style="color:red;margin-bottom: 5px;margin-top: -10px;">
                                        <strong>{{ $errors->first('password') }}</strong>
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