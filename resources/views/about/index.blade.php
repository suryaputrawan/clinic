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
                        <a href="https://www.instagram.com/idaputrawan" target="_blank"><i class="fa fa-instagram pr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3">Penggunaan Aplikasi</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <div>
                            <ol class="mt-2 mb-1 col-lg-12">
                                <li>
                                    Lakukan input pasien terlebih dahulu pada modul Patient, untuk nomor NRM mengikuti
                                    nomor NRM yang ada pada RS / Clinic masing-masing. NRM tidak dibuat otomatis, dikarenakan
                                    tidak semua patient yang datang melakukan pemeriksaan Covid-19.
                                </li>
                                <li> 
                                    Setelah itu buka modul Covid-19 untuk menginput hasil dari pemeriksaan pasien,
                                    sesuai dengan pemeriksaan yang dilakukan. Untuk NMR masukkan sesuai dengan nomor NRM yang
                                    telah di input pada modul patient.
                                </li>
                                <li>
                                    Jika terjadi kesalahan, dapat melakukan edit pada kolom action.
                                </li>
                                <li>
                                    Untuk Mencetak surat hasil pemeriksaan, dengan menekan tombol view terlebih dahulu pada 
                                    kolom action, kemudian tekan tombol Print Surat Keterangan.
                                </li>
                                <li>
                                    Isi data Perusahaan anda terlebih dahulu pada modul profil company, dimana nantinya data tersebut untuk kebutuhan 
                                    pada template surat keterangan hasil.
                                </li>
                                <li>
                                    Jika ingin menambahkan data dokter, plebotomis, labstaff, laboratorium. Dapat melakukan pada modul 
                                    Utilities.
                                </li>
                                <li>
                                    Untuk nomor surat tidak dibuat Otomatis, dikarenakan setiap perusahaan memiliki
                                    format penulisan nomor surat yang berbeda.
                                </li>
                            </ol>

                        </div>
                        <div>
                            <h6 class="text-sm-center mt-2 mb-1">
                                Terima kasih telah mencoba aplikasi ini. Aplikasi ini masih sangat jauh dari kata sempurna
                                dibuat menggunakan Laravel dengan Database MySQL.
                            </h6>
                        </div>
                        <div>
                            <h6 class="text-sm-center mt-2 mb-1">
                                Saat aplikasi ini dibuat, saya baru semester 3 dan baru mengenal dunia pemrograman, dan mengenal laravel.
                                Baru diijinkan tuhan untuk merasakan dunia perkuliahan walaupun umur telah di Kepala 3.
                            </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <p class="text-sm-center mt-4 mb-1">My Clinic Versi 0.0.1</p>
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
                        <div>
                            <h6 class="text-sm-center mt-2 mb-1">
                                Aplikasi ini dibuat awalnya di akhir tahun 2020, dimana bertujuan untuk membantu petugas medis melakukan pencatatan
                                pasien yang melakukan test PCR-SWAB dan Rapidtest.
                            </h6>
                        </div>
                        <div>
                            <h6 class="text-sm-center mt-2 mb-1">
                                Agar petugas medis tidak melakukan pencatatan pada microsoft excel,
                                dan juga membantu dokter dalam melakukan pembuatan Surat Keterangan Hasil PCR / Rapidtest.
                            </h6>
                        </div>
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