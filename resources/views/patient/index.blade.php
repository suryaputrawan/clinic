@extends('layouts.app')

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
                    <li><a href="#">Clinic Support</a></li>
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
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
              <strong class="card-title">Data Patients</strong>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NRM</th>
                  <th scope="col">SURENAME</th>
                  <th scope="col">GIVEN NAME</th>
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
                    <td>{{ $p->patSurename }}</td>
                    <td>{{ $p->patGivenname }}</td>
                    <td>{{ $p->patSex }}</td>
                    <td>{{ $p->patAddressH }}</td>
                    <td>
                      <a href="{{ route('patient.detail', $p->patNRM) }}" class="btn btn-sm btn-info">Detail</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- Pagination Start -->
          <div class="d-flex justify-content-center">
            <div>
                {{ $patient->links() }}
            </div>
          </div>
          <!-- Pagination End -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection