@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Nationality</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Utilities</a></li>
                    <li class="active">Nationality</li>
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
          <strong class="card-title">Data Nationality</strong>
          <a href="{{ route('nation.create') }}" class="btn btn-sm btn-primary float-right">Add Data</a>
      </div>
      <div class="card-body table-responsive">
        @if ($nationality->count())
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NATION</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($nationality as $key => $nation)
                <tr>
                  <td>{{ $nationality->firstItem() + $key }}</td>
                  <td>{{ $nation->nationName }}</td>
                  <td>
                    <a href="{{ route('nation.edit', $nation->nationID) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i></a>
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
                <th scope="col">NATION</th>
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