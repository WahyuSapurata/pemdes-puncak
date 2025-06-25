@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>SDGs Desa menjadi dasar dalam merencanakan pembangunan yang inklusif, adil, dan berpihak kepada seluruh
                    lapisan masyarakat.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('sdgs') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="two-column mb-5">
        <div class="container">
            <div class="sec-title">
                <h2>Skor SDGs Tahun {{ now()->format('Y') }} <span class="fw-bold">{{ $skor_sdgs }}%</span></h2>
            </div>
            <div class="row" style="row-gap: 20px">
                @foreach ($sdgsNilai as $hasil)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-header" style="background-color: #75b519">
                                <h6 class="text-white">{{ $hasil['judul'] }}</h6>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <img style="width: 50px" src="{{ asset('assets-landing/images/icons/' . $hasil['icon']) }}"
                                    alt="">
                                <h2>{{ $hasil['nilai'] }}%</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--subscribe-us section-->
    <section class="subscribe-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h3>Bersama Membangun Desa Puncak yang Maju dan Sejahtera</h3>
                    <p>Kami berkomitmen untuk mewujudkan pembangunan yang berkelanjutan di Desa Puncak, melalui peningkatan
                        infrastruktur, pelayanan publik, dan pemberdayaan masyarakat secara merata dan transparan.</p>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('hubungi-kami') }}" class="btn-style-two pull-right">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!--/End subscribe-us section-->
@endsection
