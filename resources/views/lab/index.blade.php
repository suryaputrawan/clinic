@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>LABORATORIUM</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Laboratorium</a></li>
                    <li class="active">Lab Rekanan</li>
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
          <strong class="card-title">Laboratorium</strong>
          <a href="{{ route('lab.create') }}" class="btn btn-sm btn-primary float-right">Add Data</a>
      </div>
      <div class="card-body table-responsive">
        @if ($laboratorium->count())
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NAMA Laboratorium</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">TELPHONE</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($laboratorium as $key => $l)
                <tr>
                  <td>{{ $laboratorium->firstItem() + $key }}</td>
                  <td>{{ $l->name }}</td>
                  <td>{{ $l->address }}</td>
                  <td>{{ $l->telphone }}</td>
                  <td>
                    <a href="{{ route('lab.edit', $l->id) }}" class="btn btn-sm btn-primary">
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
            {{ $laboratorium->links() }}
        </div>
      </div>
      <!-- Pagination End -->
    </div>
  </div>
</div>
@endsection