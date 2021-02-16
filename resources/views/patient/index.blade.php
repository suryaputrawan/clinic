@extends('layouts.app')

@section('title','PATIENT ')

@section('search')
  <div class="header-left">
    <form action="{{ route('search.patient') }}" method="GET" class="search-form">
      <div class="row form-group">
        <div class="col col-md-12">
          <div class="input-group">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
              </button>
            </div>
            <input type="text" name="keyword" placeholder="Search NRM / PATIENT NAME" class="form-control" autocomplete="off">
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>PATIENTS</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Patients</li>
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
      @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div> 
      @endif
      <!-- End Flass Message -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
              <div class="pull-left">
                <strong class="card-title col-sm-6">Data Patients</strong>
                <a href="{{ route('patient') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-refresh"> Refresh</i></a>
              </div>
              <a href="{{ route('patient.create') }}" class="btn btn-sm btn-primary float-right">Add Data</a>
          </div>
          <div class="card-body table-responsive">
              @if ($patient->count())
                <table class="table" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NRM</th>
                        <th scope="col">PATIENT NAME</th>
                        <th scope="col">SEX</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($patient as $key => $p)
                        <tr>
                        <td>{{ $patient->firstItem() + $key }}</td>
                        <td>{{ $p->patNRM }}</td>
                        <td>{{ $p->patGivenname }} {{ $p->patSurename }}</td>
                        <td>{{ ($p->patSex) == "L" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
                        <td>{{ $p->patAddres }}</td>
                        <td>
                            <a href="{{ route('patient.detail', $p->patNRM) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('patient.edit', $p->patNRM) }}" class="btn btn-sm btn-primary">
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
                        <th scope="col">NRM</th>
                        <th scope="col">PATIENT NAME</th>
                        <th scope="col">SEX</th>
                        <th scope="col">ADDRESS</th>
                    </tr>
                    </thead>
                    <tbody>
                        <td>There Is No Data !!!</td>
                    </tbody>
                </table>
              @endif
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection