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
                    <li class="active">Detail Pasien</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="card">
      <div class="card-header">
        <div class="pull-left">
          <strong class="card-title">Detail Patient : </strong>
          {{ $antigen->patient->patGivenname }} {{ $antigen->patient->patSurename }} 
        </div>
        <div class="pull-right">
          <a href="{{ route('antigen') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <!-- Merubah Format Tanggal yang ditampilkan -->
          <?php
          $time = strtotime($antigen->tanggal);
          $newformat = date('d M Y',$time);
          $time2 = strtotime($antigen->patient->patDOB);
          $patDOB = date('d M Y', $time2);
          ?>
          <!-- End Merubah Format tanggal yang ditampilkan -->
          <tr>
            <td style="width: 30%"><strong>Tanggal</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $newformat }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nomor Surat</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->nosurat }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>NRM</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->patient->patNRM }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nama Pasien</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->patient->patGivenname }} {{ $antigen->patient->patSurename }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Jenis Kelamin</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($antigen->patient->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Identification Number</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->patient->patidCardNo }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Phone</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->patient->patPhone }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Place Of Birth / Tempat Lahir</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->pob }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Date Of Birth / Tanggal Lahir</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patDOB }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nationality</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->nationality->nationName }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Dokter</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->dokter->doktername }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Plebotomis</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->plebotomis->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Lab Staff</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->labstaff->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Result</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->result }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Remarks</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $antigen->remarks }}</td>
          </tr>
        </table>
        <a href="{{ route('antigen.exportPdf', $antigen->id) }}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print Surat Keterangan</a>
      </div>
    </div>
  </div>
</div>
@endsection