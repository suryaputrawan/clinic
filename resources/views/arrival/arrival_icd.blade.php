@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>ARRIVAL WITH ICD</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="#">Clinic Support</a></li>
                    <li class="active">Arrival With ICD</li>
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
        <div class="col-xs-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="pull-left">
                <b>Masukkan Tanggal : </b>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ route('search.arrivalicdPeriode') }}" method="GET" class="form-inline">
                <div class="form-group mx-sm-8 mb-2">
                  <label for="tglawal" class="mx-sm-2">From</label>
                  <input name="tglawal" type="date" class="form-control" id="tglawal">
                </div>
                <div class="form-group mx-sm-4 mb-2">
                  <label for="tglakhir" class="mx-sm-2">Until</label>
                  <input name="tglakhir" type="date" class="form-control" id="tglakhir">
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-primary mb-2">Go</button>
                </div>
                <div class="form-group mx-sm-2 mb-2">
                  <a href="{{ route('search.arrivalicdPeriode') }}" class="btn btn-outline-secondary">
                    <i class="fa fa-refresh"> Refresh</i></a>
                </div>
              </form>
            </div>
            <!-- Membuat kondisi jika tanggal masih kosong -->
            @if ($tglawal ?? '' && $tglakhir ?? '' != NULL)
            <div class="card-header">
              <div class="pull-left">
                <!-- Merubah Format Tanggal yang ditampilkan -->
                  <?php
                    $date = strtotime($tglawal);
                    $awal = date('d M Y',$date);
                    $date2 = strtotime($tglakhir);
                    $akhir = date('d M Y',$date2);
                  ?>
                <!-- End Merubah Format tanggal yang ditampilkan -->
                <b>Hasil Pencarian : </b> <i>{{ $awal }} sampai {{ $akhir }}</i>
              </div>
              <div class="pull-right">
                <a href="{{ route('report.arrivalicd',['tglawal'=>$tglawal ?? '','tglakhir' =>$tglakhir ?? '']) }}" class="btn btn-outline-success btn-sm">
                  <i class="fa fa-download"> To Excel</i></a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NRM</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">ICD Code</th>
                    <th scope="col">Arrival NO</th>
                    <th scope="col">Arrival Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($arrivalicd as $key => $arvicd)
                  <!-- Merubah Format Tanggal yang ditampilkan -->
                    <?php
                    $time = strtotime($arvicd->arvDate);
                    $date = date('d M Y',$time);
                    ?>
                  <!-- End Merubah Format tanggal yang ditampilkan -->
                    <tr>
                      <th scope="row">{{ $arrivalicd->firstItem() + $key }}</th>
                      <td>{{ $arvicd->patNRM }}</td>
                      <td>{{ $arvicd->patGivenname }} {{ $arvicd->patSurename }}</td>
                      <td>{{ $arvicd->arvAgeYr }}</td>
                      <td>{{ $arvicd->icdcode }}</td>
                      <td>{{ $arvicd->arvNo }}</td>
                      <td>{{ $date }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Pagination Start -->
            <div class="d-flex justify-content-center">
              <div>
                  {{ $arrivalicd->links() }}
              </div>
            </div>
            <!-- Pagination End --> 
            @else
              <div class="card-body">
                NO DATA !
              </div>  
            @endif
            <!-- END Membuat kondisi jika tanggal masih kosong -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection