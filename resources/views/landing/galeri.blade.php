@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Setiap foto di galeri ini adalah saksi perjalanan Desa Puncak menuju desa yang lebih baik. Dari gotong
                    royong warga, pembangunan fasilitas umum, hingga acara adat—semuanya kami abadikan di sini.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('galeri') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="our-gallery">
        <div class="container">
            <div class="row">
                @forelse ($galeri as $g)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="img_holder">
                                <div class="position-relative">
                                    <img src="{{ asset('/public/galeri/' . $g->gambar) }}" alt="image">
                                    <div class="position-absolute"
                                        style="z-index: 9; bottom: 0; width: 100%; padding: 25px; text-align: center;">
                                        <span
                                            class="p-2 rounded bg-white fs-6 fw-bold"><strong>{{ $g->judul }}</strong></span>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="inner">
                                        <a href="{{ asset('/public/galeri/' . $g->gambar) }}"
                                            data-fancybox-group="example-gallery" class="view lightbox-image"><i
                                                class="flaticon-add"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning text-center">
                            <strong>Perhatian!</strong> Data galeri desa belum tersedia.
                        </div>
                    </div>
                @endforelse

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
