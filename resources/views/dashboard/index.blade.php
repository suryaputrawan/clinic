@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>My Clinic</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
    <div class="col-xl-8 col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one" id="chartRapid">
                </div>
            </div>
        </div>
    </div>

  <div class="col-xl-4 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><a href="{{ route('rapidtest') }}"><i class="ti-user text-success border-success"></i></a></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Pasien Rapid Test</div>
                    <div class="number">{{ totalrapid() }}</div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><a href="{{ route('swabtest') }}"><i class="ti-user text-danger border-danger"></i></a></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Pasien Swabtest</div>
                    <div class="number">{{ totalswab() }}</div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><a href="{{ route('antigen') }}"><i class="ti-user text-danger border-danger"></i></a></div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Pasien Antigen Swab</div>
                    <div class="number">{{ totalAntigen() }}</div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartRapid', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rapidtest, PCR-Swab, Antigen'
        },
        subtitle: {
            text: {{ $thSekarang }}
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Patient'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            //useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Rapidtest',
            data: {!! json_encode($datas) !!}
        },{
            name: 'PCR-Swabtest',
            data: {!! json_encode($dataSwab) !!}
        },{
            name: 'Antigen Swab',
            data: {!! json_encode($dataAntigen) !!}
        }],
    });
</script>
@endsection