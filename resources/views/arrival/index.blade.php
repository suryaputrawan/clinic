@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>ARRIVAL</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Master</a></li>
                    <li class="active">Data Arrival</li>
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
            <strong class="card-title">Data Arrival</strong>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NRM</th>
                <th scope="col">PATIENT NAME</th>
                <th scope="col">SEX</th>
                <th scope="col">AGE</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE</th>
                <th scope="col">NATIONALITY</th>
                <th scope="col">EMAIL</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($arrival as $key => $arv)
                <tr>
                  <td>{{ $arrival->firstItem() + $key }}</td>
                  <td>{{ $arv->patNRM }}</td>
                  <td>{{ $arv->patientname }}</td>
                  <td>{{ ($arv->patSex) == "M" ? 'Male' : 'Female' }}</td>
                  <td>{{ $arv->arvAgeYr }}</td>
                  <td>{{ $arv->patAddressH}}</td>
                  <td>{{ $arv->patPhone }}</td>
                  <td>{{ $arv->nationName }}</td>
                  <td>{{ $arv->patEmail }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Pagination Start -->
        <div class="d-flex justify-content-center">
          <div>
              {{ $arrival->links() }}
          </div>
        </div>
        <!-- Pagination End -->
      </div>
    </div>
  </div>
@endsection