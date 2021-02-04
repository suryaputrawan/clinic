@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Dokter</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dokter') }}">Dokter</a></li>
                    <li class="active">Detail Dokter</li>
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
          <strong class="card-title">Detail Dokter : </strong>
          {{ $dokter->doktername }}
        </div>
        <div class="pull-right">
          <a href="{{ route('dokter') }}" class="btn btn-sm btn-secondary">
            <i class="fa fa-undo"></i> Back</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr>
            <td style="width: 30%"><strong>Nama Dokter</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $dokter->doktername }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Alamat</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $dokter->dokterAddr }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Telphone</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ ($dokter->dokterTelp) }}</td>
          </tr>
          <tr>
            <td style="width: 30%"><strong>Email</strong></td>
            <td style="width: 2%"><strong>:</strong></td>
            <td style="width: 65%">{{ $dokter->dokterEmail }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection