@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Input Data Dokter</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dokter') }}">Dokter</a></li>
                    <li class="active">Input Dokter</li>
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
            <strong>Form Input Data</strong> Dokter
          </div>
          <div class="pull-right">
            <a href="{{ route('dokter') }}" class="btn btn-sm btn-secondary">
              <i class="fa fa-undo"></i> Back</a>
          </div>
        </div>
        <div class="card-body card-block">
          <form action="{{ route('dokter.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
              <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Dokter</label></div>
              <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nama Dokter" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="address" class=" form-control-label">Alamat</label></div>
                <div class="col-12 col-md-9"><textarea name="address" id="address" rows="3" placeholder="Alamat" class="form-control" autocomplete="off">{{ old('address') }}</textarea></div>
              </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="telphone" class=" form-control-label">Telephone / HP</label></div>
              <div class="col-12 col-md-9"><input type="text" id="telphone" name="telphone" placeholder="Telp dokter" class="form-control" value="{{ old('telphone') }}" autocomplete="off"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" autocomplete="off"></div>
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