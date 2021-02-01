@extends('layouts.app')

@section('title','Report - ')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>REPORT</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">Report Rapid & Swabtest</li>
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
          <div class="col-xs-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                  <div class="pull-left">
                    <strong>Report</strong> <small> Rapidtest</small>
                  </div>
                </div>
                <div class="card-body card-block">
                  <form action="{{ route('report.rapidtest') }}" method="GET" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class=" form-control-label">Tanggal Awal</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input name="tglawal" id="tglawal" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class=" form-control-label">Tanggal Akhir</label>
                      <div class="input-group">
                          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          <input name="tglakhir" id="tglakhir" type="date" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pull-right">
                        <button type="submit" class="btn btn-sm btn-success">
                          <i class="fa fa-print"></i> Export To Excel
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>

          <div class="col-xs-6 col-sm-6">
              <div class="card">
                  <div class="card-header">
                    <div class="pull-left">
                      <strong>Report</strong> <small> Swabtest</small>
                    </div>
                  </div>
                  <div class="card-body card-block">
                    <form action="{{ route('report.swabtest') }}" method="GET" enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group">
                          <label class=" form-control-label">Tanggal Awal</label>
                          <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              <input name="tglawal" id="tglawal" type="date" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                        <label class=" form-control-label">Tanggal Akhir</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input name="tglakhir" id="tglakhir" type="date" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="pull-right">
                          <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-print"></i> Export To Excel
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
  </div>
@endsection