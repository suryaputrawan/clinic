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
                    <li><a href="{{ route('rapidtest') }}">Rapid Test</a></li>
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
          {{ $rapid->patient->patSurename }} {{ $rapid->patient->patGivenname }}
        </div>
        <div class="pull-right">
          <a href="{{ route('rapidtest') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <!-- Merubah Format Tanggal yang ditampilkan -->
          <?php
          $time = strtotime($rapid->tanggal);
          $newformat = date('d M Y',$time);
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
            <td style="width: 65%">{{ $rapid->nosurat }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>NRM</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->patient->patNRM }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nama Pasien</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->patient->patGivenname }} {{ $rapid->patient->patSurename }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Jenis Kelamin</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($rapid->patient->patSex) == "L" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Identification Number</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->patient->patidCardNo }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Phone</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->patient->patPhone }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Place Of Birth / Tempat Lahir</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->pob }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nationality</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->nationality->nationName }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Dokter</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->dokter->doktername }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Plebotomis</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->plebotomis->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Lab Staff</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->labstaff->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Result</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->result }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Remarks</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $rapid->remarks }}</td>
          </tr>
        </table>
        <a href="{{ route('rapidtest.exportPdf', $rapid->id) }}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print Surat Keterangan</a>
      </div>
    </div>
  </div>
</div>
@endsection