@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Staff Lab</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Laboratorium</a></li>
                    <li class="active">Lab Staff</li>
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
          <strong class="card-title">Laboratorium Staff</strong>
          <a href="{{ route('labstaff.create') }}" class="btn btn-sm btn-primary float-right">Add Data</a>
      </div>
      <div class="card-body table-responsive">
        @if ($labstaff->count())
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NAMA STAFF</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($labstaff as $key => $lab)
                <tr>
                  <td>{{ $labstaff->firstItem() + $key }}</td>
                  <td>{{ $lab->name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NAMA STAFF</th>
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
      <!-- Pagination Start -->
      <div class="d-flex justify-content-center">
        <div>
            {{ $labstaff->links() }}
        </div>
      </div>
      <!-- Pagination End -->
    </div>
  </div>
</div>
@endsection