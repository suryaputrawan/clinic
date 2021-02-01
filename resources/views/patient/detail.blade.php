@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Patients</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Clinic Support</a></li>
                    <li><a href="{{ route('patient') }}">Patients</a></li>
                    <li class="active">Detail Patient</li>
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
          {{ $patient->patGivenname }} {{ $patient->patSurename }}
        </div>
        <div class="pull-right">
          <a href="{{ route('patient') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <!-- Merubah Format Tanggal yang ditampilkan -->
          <?php
          $date = strtotime($patient->patDOB);
          $date2 = strtotime($patient->patRegDate);
          $date3 = strtotime($patient->patlastarvdate);
          $patDOB = date('d M Y',$date);
          $patRegDate = date('d M Y',$date2);
          $patlastarvdate = date('d M Y',$date3);
          ?>
          <!-- End Merubah Format tanggal yang ditampilkan -->
          <tr>
            <td style="width: 30%"><strong>NRM</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patient->patNRM }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Nama Pasien</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patient->patGivenname }} {{ $patient->patSurename }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Jenis Kelamin</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($patient->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Date of Birth</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($patDOB) }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Identification Number</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patient->patidCardNo }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Phone</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patient->patPhone }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Email</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patient->patEmail }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Registration Date</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patRegDate }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Last Arrival</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $patlastarvdate }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection