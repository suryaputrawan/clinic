@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>COMPANY</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Company</li>
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
    @if (session('sukses'))
    <div class="alert alert-primary" role="alert">
      {{ session('sukses') }}
    </div> 
    @endif
    <!-- End Flass Message -->
    <div class="card">
      <div class="card-header">
          <strong class="card-title">Profil Perusahaan</strong>
      </div>
      <div class="card-body table-responsive">
        @if ($company->count())
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NAMA PERUSAHAAN</th>
                <th scope="col">RUMAH SAKIT / CLINIC</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($company as $key => $com)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $com->name}}</td>
                  <td>{{ $com->alias }}</td>
                  <td>{{ $com->address }}</td>
                  <td>
                    <a href="{{ route('company.edit', $com->id) }}" class="btn btn-sm btn-primary">
                      <i class="fa fa-edit"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>  
        @else
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                  <td>There is no Data !!!</td>
                  <td></td>
                </tr>
            </tbody>
          </table> 
        @endif

      </div>
    </div>
  </div>
</div>
@endsection