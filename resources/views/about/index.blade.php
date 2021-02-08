@extends('layouts.app')

@section('breadcrumbs')
  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>ABOUT</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="active">About</li>
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
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">About Me</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="{{ asset('style/images/mypict.jpeg') }}" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">Ida Bagus Surya Putrawan</h5>
                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Denpasar, Bali</div>
                        <p class="text-sm-center mt-4 mb-1">My Clinic Versi 0.0.1</p>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                        <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                        <a href="https://www.instagram.com/idaputrawan" target="_blank"><i class="fa fa-instagram pr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">About Application</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <h6 class="text-sm-center mt-2 mb-1">
                            Aplikasi ini dibuat awalnya di akhir tahun 2020, dimana bertujuan untuk membantu petugas medis melakukan pencatatan
                            pasien yang melakukan test PCR-SWAB dan Rapidtest. Agar petugas medis tidak melakukan pencatatan pada microsoft excel,
                            dan juga membantu dokter dalam melakukan pembuatan Surat Keterangan Hasil PCR / Rapidtest.
                        </h6>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <p class="text-sm-center mt-4 mb-1">My Clinic Versi 0.0.1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection