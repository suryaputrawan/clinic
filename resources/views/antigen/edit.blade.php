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
                    <li><a href="{{ route('antigen') }}">Antigen Swab</a></li>
                    <li class="active">Edit Antigen Swab</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="content mt-3">
  <div class="animated fadeIn">
    <!-- Session Message -->
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div> 
    @endif
     <!-- End Session Message -->
    <div class="card">
      <div class="card-header">
        <div class="pull-left">
          <strong>Edit Data</strong> Antigen
        </div>
        <div class="pull-right">
          <a href="{{ route('antigen') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('antigen.update', $antigen->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
          @csrf
          <div class="row form-group">
            <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal Rapid Test</label></div>
            <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Text" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $antigen->tanggal) }}" autocomplete="off">
              @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nosurat" class=" form-control-label">Nomor Surat</label></div>
            <div class="col-12 col-md-9"><input type="text" id="nosurat" name="nosurat" placeholder="Masukkan Nomor Surat" class="form-control @error('nosurat') is-invalid @enderror" value="{{ old('nosurat', $antigen->nosurat) }}" autocomplete="off">
              @error('nosurat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="nrm" class=" form-control-label">NRM Patient</label></div>
            <div class="col-12 col-md-9"><input type="text" id="nrm" name="patient_patNRM" placeholder="Masukkan NRM Patient yang telah di input di modul patient" class="form-control @error('patient_patNRM') is-invalid @enderror" value="{{ old('patient_patNRM', $antigen->patient_patNRM) }}" autocomplete="off">
              @error('patient_patNRM')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="pob" class=" form-control-label">Tempat Lahir</label></div>
            <div class="col-12 col-md-9"><input type="text" id="pob" name="pob" placeholder="Place Of Birth" class="form-control @error('pob') is-invalid @enderror" value="{{ old('pob', $antigen->pob) }}" autocomplete="off">
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
                  <option value="{{ $nation->nationID }}" {{ old('nationality_nationID', $antigen->nationality_nationID) == $nation->nationID ? 'selected' : null }}>{{ $nation->nationName }}</option>
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
              <select name="dokter_dokterID" id="doctor" class="form-control @error('dokter_dokterID') is-invalid @enderror" value="{{ old('dokter_dokterID') }}">
                <option value="">Please select</option>
                @foreach ($dokter as $dok)
                  <option value="{{ $dok->dokterID }}" {{ old('dokter_dokterID', $antigen->dokter_dokterID) == $dok->dokterID ? 'selected' : null }}>{{ $dok->doktername }}</option>
                @endforeach
              </select>
              @error('dokter_dokterID')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="plebotomis" class=" form-control-label">Petugas Plebotomis</label></div>
            <div class="col-12 col-md-9">
              <select name="plebotomis_id" id="plebotomis" class="form-control @error('plebotomis_id') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($plebotomis as $plebo)
                  <option value="{{ $plebo->id }}" {{ old('plebotomis_id', $antigen->plebotomis_id) == $plebo->id ? 'selected' : null }}>{{ $plebo->name }}</option>
                @endforeach
              </select>
              @error('plebotomis_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="labstaff" class=" form-control-label">Lab Staff</label></div>
            <div class="col-12 col-md-9">
              <select name="labstaff_id" id="labstaff" class="form-control @error('labstaff_id') is-invalid @enderror">
                <option value="">Please select</option>
                @foreach ($labstaff as $lab)
                  <option value="{{ $lab->id }}" {{ old('labstaff_id', $antigen->labstaff_id) == $lab->id ? 'selected' : null }}>{{ $lab->name }}</option>
                @endforeach
              </select>
              @error('labstaff_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="result" class=" form-control-label">Result</label></div>
            <div class="col-12 col-md-9">
              <select name="result" id="result" class="form-control @error('result') is-invalid @enderror">
                <option value="">Please select</option>
                <option value="Positif" {{ old('result', $antigen->result) == "Positif" ? 'selected' : null }}>Positif</option>
                <option value="Negative" {{ old('result', $antigen->result) == "Negative" ? 'selected' : null }}>Negative</option>
              </select>
              @error('result')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="remarks" class=" form-control-label">Remarks</label></div>
            <div class="col-12 col-md-9"><textarea name="remarks" id="remarks" rows="5" placeholder="" class="form-control" autocomplete="off">{{ old('remarks', $antigen->remarks) }}</textarea></div>
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