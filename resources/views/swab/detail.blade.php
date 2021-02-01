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
          <strong class="card-title">Detail</strong>
          {{ $swabtest->patient->patGivenname }}
        </div>
        <div class="pull-right">
          <a href="{{ route('swabtest') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <!-- Merubah format tanggal -->
          <?php
            $time = strtotime($swabtest->tanggal_sampling);
            $date_sampling = date('d M Y',$time);

            $time2 = strtotime($swabtest->tanggal_validasi);
            $date_validate = date('d M Y',$time2);

            $time3 = strtotime($swabtest->tanggal_surat);
            $date_letter = date('d M Y',$time3);

            $time4 = strtotime($swabtest->waktu_validasi);
            $validate_time = date('H:i:s',$time4);
          ?>
          <!-- END Merubah format tanggal -->
          <tr>
            <td style="width: 30%"><strong>Tanggal Sampling</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $date_sampling }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Tanggal Validasi</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $date_validate }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Waktu Validasi</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $validate_time }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Tanggal Surat</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $date_letter }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nomor Surat</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->nosurat }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>NRM</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->patient_patNRM }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Patient Name</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->patient->patGivenname }} {{ $swabtest->patient->patSurename }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Jenis Kelamin</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($swabtest->patient->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Identification Number</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->patient->patidCardNo }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Phone</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->patient->patPhone }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Place Of Birth / Tempat Lahir</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->pob }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nationality</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->nationality->nationName }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Dokter</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->dokter->doktername }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Laboratorium</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->laboratorium->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Result</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->result }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Remarks</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $swabtest->remarks }}</td>
          </tr>
        </table>
        <a href="{{ route('swabtest.exportPdf', $swabtest->id) }}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Print Surat Keterangan</a>
      </div>
    </div>
  </div>
</div>
@endsection