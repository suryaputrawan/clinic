@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Input Data Staff Lab</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Utilities</a></li>
                    <li><a href="{{ route('labstaff') }}">Lab Staff</a></li>
                    <li class="active">Input Data</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">
      <!-- Flass Message -->
      @if (session('error'))
        <div class="alert alert-danger" role="alert">
          {{ session('error') }}
        </div> 
      @endif
      <!-- End Flass Message -->
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong>Form Input Data</strong> Staff Lab
          </div>
          <div class="pull-right">
            <a href="{{ route('labstaff') }}" class="btn btn-sm btn-secondary">
              <i class="fa fa-undo"></i> Back</a>
          </div>
        </div> 
        <div class="card-body card-block">
          <form action="{{ route('labstaff.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
              <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Petugas</label></div>
              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="nama petugas" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <button type="submit" class="btn btn-primary btn-sm">
                  <i class="fa fa-dot-circle-o"></i> Save
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                  <i class="fa fa-ban"></i> Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection