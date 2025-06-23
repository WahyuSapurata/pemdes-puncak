@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Memberikan informasi Transparansi APBDes Desa Puncak,
                    Kami membuka akses informasi anggaran desa sebagai bentuk komitmen terhadap transparansi dan
                    akuntabilitas dalam pengelolaan keuangan desa untuk kemajuan bersama.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('penduduk') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->
@endsection
