@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>PLEBOTOMIS</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Plebotomis</li>
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
    <div class="content mt-3">
      <div class="animated fadein">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Plebotomis Staff</strong>
            <a href="{{ route('plebotomis.create') }}" class="btn btn-sm btn-primary float-right">Add Data</a>
          </div>
          <div class="card-body table-responsive">
            @if ($plebotomis->count())
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAMA STAFF</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($plebotomis as $key => $plebo)
                    <tr>
                      <td>{{ $plebotomis->firstItem() + $key }}</td>
                      <td>{{ $plebo->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else 
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
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
                {{ $plebotomis->links() }}
            </div>
          </div>
          <!-- Pagination End -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection