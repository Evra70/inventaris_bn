@extends('master.master')

@section('page-title', 'Home')

@section('user-login','Ephraim Jehudah')

@section('title','Home')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <h3 class="mb-0">Icons</h3>
        </div>
        <div class="card-body">
          <div class="row icon-examples">
            <div class="col-lg-3 col-md-6">
              <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                <div>
                  <i class="ni ni-active-40"></i>
                  <span>active-40</span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection