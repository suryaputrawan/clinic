@extends('layouts.app')

@section('title','Swabtest ')

@section('search')
  <div class="header-left">
    <form action="{{ route('search.swabtest') }}" method="GET" class="search-form">
      <div class="row form-group">
        <div class="col col-md-12">
          <div class="input-group">
            <div class="input-group-btn">
              <button class="btn btn-primary">
                <i class="fa fa-search"></i>
              </button>
            </div>
            <input type="text" id="keyword" name="keyword" placeholder="Search No Surat / MRN / Patient Name / Result" class="form-control" autocomplete="off">
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
                <h1>PCR / SWABTEST - COVID 19</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Swabtest</li>
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
      <div class="card">
        <div class="card-header">
          <div class="pull-left">
            <strong class="card-title col-sm-6">DATA SWABTEST</strong>
            <a href="{{ route('swabtest') }}" class="btn btn-sm btn-outline-secondary">
              <i class="fa fa-refresh"> Refresh</i></a>

            <!-- Button trigger modal -->
            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-filter"> Filter</i></a>
            <!-- End Button trigger modal -->

            <a href="{{ route('report.swabtest',['tglawal' => $tglawal ?? '','tglakhir' => $tglakhir ?? '']) }}" class="btn btn-sm btn-outline-success">
              <i class="fa fa-download"> To Excel</i></a>
          </div>
          <div class="pull-right">
            <a href="{{ route('swabtest.create') }}" class="btn btn-sm btn-info">
              <i class="fa fa-plus"></i> Add</a>
          </div>
        </div>
        <div class="card-body table-responsive">
          @if ($swabtest->count())
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">SAMPEL DATE</th>
                  <th scope="col">NO SURAT</th>
                  <th scope="col">NRM</th>
                  <th scope="col">GIVEN NAME</th>
                  <th scope="col">RESULT</th>
                  <th scope="col">ACTION</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($swabtest as $key => $s)
                <?php
                  $time = strtotime($s->tanggal_sampling);
                  $newformat = date('d M Y',$time);
                ?>
                  <tr>
                    <td>{{ $swabtest->firstItem() + $key }} </td>
                    <td>{{ $newformat }} </td>
                    <td>{{ $s->nosurat }} </td>
                    <td>{{ $s->patient_patNRM }} </td>
                    <!-- Menampilkan nama data dari tabel lain -->
                    <td>{{ $s->patient->patGivenname }} </td>
                    <!-- End Menampilkan nama data dari tabel lain -->
                    <td>{{ $s->result }} </td>
                    <td>
                      <a href="{{ route('swabtest.detail', $s->id) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="{{ route('swabtest.edit', $s->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-edit"></i>
                      </a>
                      <!-- <a href="{{ route('swabtest.delete', $s->id) }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i> -->
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
                  <th scope="col">TANGGAL</th>
                  <th scope="col">NO SURAT</th>
                  <th scope="col">NRM</th>
                  <th scope="col">SURENAME</th>
                  <th scope="col">RESULT</th>
                  <th scope="col">ACTION</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>There is no Data !!!</td>
                  </tr>
              </tbody>
            </table>
          @endif
          <strong>Total Data : {{ $swabtest->total() }}</strong><br>
          <strong>Page {{ $swabtest->currentPage() }} of {{ $swabtest->lastPage() }}</strong>
        </div>
        <!-- Pagination Start -->
        <div class="d-flex justify-content-center">
          <div>
              {{ $swabtest->links() }}
          </div>
        </div>
        <!-- Pagination End -->
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Data Swabtest</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('search.swabPeriode') }}" method="GET">
            <div class="form-group">
              <label for="tglawal">Tanggal Awal</label>
              <input name="tglawal" type="date" class="form-control" id="tglawal">
            </div>
            <div class="form-group">
              <label for="tglakhir">Tanggal Akhir</label>
              <input name="tglakhir" type="date" class="form-control" id="tglakhir">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Show</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
@endsection