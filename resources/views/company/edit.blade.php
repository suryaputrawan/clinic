@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Data Company</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('company') }}">Company</a></li>
                    <li class="active">Edit Data</li>
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
            <strong>Form Edit Data</strong> Company
          </div>
          <div class="pull-right">
            <a href="{{ route('company') }}" class="btn btn-sm btn-secondary">
              <i class="fa fa-undo"></i> Back</a>
          </div>
        </div>
        <div class="card-body card-block">
          <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3"><label for="name" class=" form-control-label">Nama Perusahaan</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nama Perusahaan" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $company->name) }}" autocomplete="off">
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="alias" class=" form-control-label">RS / CLINIC</label></div>
                <div class="col-12 col-md-9"><input type="text" id="alias" name="alias" placeholder="RS / CLINIC" class="form-control @error('alias') is-invalid @enderror" value="{{ old('alias', $company->alias) }}" autocomplete="off">
                  @error('alias')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="address" class=" form-control-label">Alamat</label></div>
                <div class="col-12 col-md-9"><input type="text" id="address" name="address" placeholder="Alamat" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $company->address) }}" autocomplete="off">
                  @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="telphone" class=" form-control-label">Telephone / HP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="telphone" name="telphone" placeholder="Telphone" class="form-control" value="{{ old('telphone', $company->telphone) }}" autocomplete="off"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="npwp" class=" form-control-label">NPWP</label></div>
                <div class="col-12 col-md-9"><input type="text" id="npwp" name="npwp" placeholder="npwp" class="form-control" value="{{ old('npwp', $company->npwp) }}" autocomplete="off"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo... </label></div>
                <div class="col-8 col-md-9"><input type="file" id="logo" name="logo" placeholder="logo" class="form-control" value="{{ old('logo', $company->logo) }}" autocomplete="off"></div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-dot-circle-o"></i> Save
                </button>
                <a href="{{ route('company') }}" class="btn btn-danger">
                  <i class="fa fa-ban"></i> Cancel
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection