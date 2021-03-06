@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Patient</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('patient') }}">Data Patient</a></li>
                    <li class="active">Edit Data Patient</li>
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
          <strong>Edit Data</strong> Patient
        </div>
        <div class="pull-right">
          <a href="{{ route('patient') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('patient.update',$patient->patNRM) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
          @csrf
          <div class="row form-group">
            <div class="col col-md-3"><label for="patnrm" class=" form-control-label">NRM Patient</label></div>
            <div class="col-12 col-md-9"><input type="text" id="patnrm" name="patnrm" placeholder="Masukkan NRM Patient" class="form-control @error('patnrm') is-invalid @enderror" value="{{ old('patnrm', $patient->patNRM) }}" autocomplete="off">
              @error('patnrm')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="idcard" class=" form-control-label">Identification Nomor</label></div>
            <div class="col-12 col-md-9"><input type="text" name="idcard" placeholder="Masukkan Nomor KTP atau Passport" class="form-control @error('idcard') is-invalid @enderror" value="{{ old('idcard', $patient->patidCardNo) }}" autocomplete="off">
              @error('idcard')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="surename" class=" form-control-label">Surename</label></div>
            <div class="col-12 col-md-9"><input type="text" id="surename" name="surename" placeholder="Insert Surename Patient" class="form-control @error('surename') is-invalid @enderror" value="{{ old('surename', $patient->patSurename) }}" autocomplete="off">
              @error('surename')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="givenname" class=" form-control-label">Givenname</label></div>
            <div class="col-12 col-md-9"><input type="text" id="givenname" name="givenname" placeholder="Insert Givenname Patient" class="form-control @error('givenname') is-invalid @enderror" value="{{ old('givenname', $patient->patGivenname) }}" autocomplete="off">
              @error('givenname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="dob" class=" form-control-label">Date Of Birth</label></div>
            <div class="col-12 col-md-9"><input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $patient->patDOB) }}" autocomplete="off">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="sex" class=" form-control-label">SEX</label></div>
            <div class="col-12 col-md-9">
              <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror">
                <option value="">Please select</option>
                <option value="L" {{ old('sex', $patient->patSex) == "L" ? 'selected' : null }}>Male / Laki - laki</option>
                <option value="P" {{ old('sex', $patient->patSex) == "P" ? 'selected' : null }}>Female / Perempuan</option>
              </select>
              @error('sex')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="address" class=" form-control-label">Address</label></div>
            <div class="col-12 col-md-9"><textarea name="address" id="address" rows="3" placeholder="Alamat" class="form-control" autocomplete="off">{{ old('address', $patient->patAddres) }}</textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="phone" class=" form-control-label">Phone</label></div>
            <div class="col-12 col-md-9"><input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->patPhone) }}" autocomplete="off">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
            <div class="col-12 col-md-9"><input type="email" name="email" class="form-control" value="{{ old('email', $patient->patEmail) }}" autocomplete="off">
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nationality" class=" form-control-label">Nationality</label></div>
            <div class="col-12 col-md-9">
              <select name="nationality_nationID" id="nationality" class="form-control @error('nationality_nationID') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($nationality as $nation)
                  <option value="{{ $nation->nationID }}" {{ old('nationality_nationID', $patient->nationality_nationID) == $nation->nationID ? 'selected' : null }}>{{ $nation->nationName }}</option>
                @endforeach
              </select>
              @error('nationality_nationID')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>  
          <div class="row form-group">
            <div class="col col-md-3">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Save
              </button>
              <a href="{{ route('patient') }}" class="btn btn-danger">
                <i class="fa fa-ban"> Cancel</i></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection