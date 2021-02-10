@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>COVID 19</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('swabtest') }}">Swabtest</a></li>
                    <li class="active">Input Swabtest</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="content mt-3">
  <div class="animated fadeIn">
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div> 
    @endif
    <div class="card">
      <div class="card-header">
        <div class="pull-left">
          <strong>Input Data</strong> Swabtest
        </div>
        <div class="pull-right">
          <a href="{{ route('swabtest') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('swabtest.update', $swabtest->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
          @csrf
          <!-- Merubah format waktu dan tanggal -->
          <?php
            $time = strtotime($swabtest->waktu_validasi);
            $validate_time = date('H:i:s',$time);
          ?>
          <!-- END Merubah format waktu dan tanggal -->
          <div class="row form-group">
            <div class="col col-md-3"><label for="tanggal_sampling" class=" form-control-label">Tanggal Pengambilan Swabtest</label></div>
            <div class="col-12 col-md-9"><input type="date" id="tanggal_sampling" name="tanggal_sampling" placeholder="Text" class="form-control @error('tanggal_sampling') is-invalid @enderror" value="{{ old('tanggal_sampling', $swabtest->tanggal_sampling) }}">
              @error('tanggal_sampling')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="tanggal_validasi" class=" form-control-label">Tanggal Validasi Swabtest</label></div>
            <div class="col-12 col-md-9"><input type="date" id="tanggal_validasi" name="tanggal_validasi" placeholder="Text" class="form-control @error('tanggal_validasi') is-invalid @enderror" value="{{ old('tanggal_validasi', $swabtest->tanggal_validasi) }}">
              @error('tanggal_validasi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="waktu_validasi" class=" form-control-label">Waktu Validasi</label></div>
            <div class="col-12 col-md-9"><input type="text" id="waktu_validasi" name="waktu_validasi" placeholder="Text" class="form-control @error('waktu_validasi') is-invalid @enderror" value="{{ old('waktu_validasi', $validate_time) }}">
              @error('waktu_validasi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="tanggal_surat" class=" form-control-label">Tanggal Surat Swabtest</label></div>
            <div class="col-12 col-md-9"><input type="date" id="tanggal_surat" name="tanggal_surat" placeholder="Text" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat', $swabtest->tanggal_surat) }}">
              @error('tanggal_surat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nosurat" class=" form-control-label">Nomor Surat</label></div>
            <div class="col-12 col-md-9"><input type="text" id="nosurat" name="nosurat" placeholder="Masukkan Nomor Surat" class="form-control @error('nosurat') is-invalid @enderror" value="{{ old('nosurat', $swabtest->nosurat) }}" autocomplete="off">
              @error('nosurat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nrm" class=" form-control-label">NRM Patient</label></div>
            <div class="col-12 col-md-9"><input type="text" id="nrm" name="patient_patNRM" placeholder="Masukkan NRM Patient yang telah di input di modul patient" class="form-control @error('patient_patNRM') is-invalid @enderror" value="{{ old('patient_patNRM', $swabtest->patient_patNRM) }}" autocomplete="off">
              @error('patient_patNRM')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="pob" class=" form-control-label">Tempat Lahir</label></div>
            <div class="col-12 col-md-9"><input type="text" id="pob" name="pob" placeholder="Place Of Birth" class="form-control @error('pob') is-invalid @enderror" value="{{ old('pob', $swabtest->pob) }}" autocomplete="off">
              @error('pob')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nationality" class=" form-control-label">Nationality</label></div>
            <div class="col-12 col-md-9">
              <select name="nationality_nationID" id="nationality" class="form-control @error('nationality_nationID') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($nationality as $nation)
                  <option value="{{ $nation->nationID }}" {{ old('nationality_nationID', $swabtest->nationality_nationID) == $nation->nationID ? 'selected' : null }}>{{ $nation->nationName }}</option>
                @endforeach
              </select>
              @error('nationality_nationID')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>  
          <div class="row form-group">
            <div class="col col-md-3"><label for="doctor" class=" form-control-label">Nama Doctor</label></div>
            <div class="col-12 col-md-9">
              <select name="dokter_dokterID" id="doctor" class="form-control @error('dokter_dokterID') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($dokter as $dok)
                  <option value="{{ $dok->dokterID }}" {{ old('dokter_dokterID', $swabtest->dokter_dokterID) == $dok->dokterID ? 'selected' : null }}>{{ $dok->doktername }}</option>
                @endforeach
              </select>
              @error('dokter_dokterID')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="labstaff" class=" form-control-label">Laboratorium</label></div>
            <div class="col-12 col-md-9">
              <select name="laboratorium_id" id="labstaff" class="form-control @error('laboratorium_id') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($lab as $l)
                  <option value="{{ $l->id }}" {{ old('laboratorium_id', $swabtest->laboratorium_id) == $l->id ? 'selected' : null }}>{{ $l->name }}</option>
                @endforeach
              </select>
              @error('laboratorium_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="result" class=" form-control-label">Result</label></div>
            <div class="col-12 col-md-9">
              <select name="result" id="result" class="form-control @error('result') is-invalid @enderror">
                <option value="">Please select</option>
                <option value="Positif" {{ old('result', $swabtest->result) == "Positif" ? 'selected' : null }}>Positif</option>
                <option value="Negative" {{ old('result', $swabtest->result) == "Negative" ? 'selected' : null }}>Negative</option>
              </select>
              @error('result')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="remarks" class=" form-control-label">Remarks</label></div>
            <div class="col-12 col-md-9"><textarea name="remarks" id="remarks" rows="5" placeholder="" class="form-control" autocomplete="off">{{ old('remarks', $swabtest->remarks) }}</textarea></div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-dot-circle-o"></i> Save
              </button>
              <button type="cancel" class="btn btn-danger">
                <i class="fa fa-ban"></i> Cancel
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection