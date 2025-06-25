@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Lapak Desa adalah tempat online untuk memasarkan produk lokal warga Desa Puncak. Mulai dari hasil tani,
                    kerajinan, kuliner, hingga jasa - semua ada untuk mendukung ekonomi desa yang mandiri.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('lapakdesa') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="our-service">
        <div class="container">
            <div class="service-list">
                <div class="row" style="row-gap: 15px">
                    @forelse ($data as $ld)
                        <div class="col-lg-3 col-md-6">
                            <div class="item">
                                <div class="img_holder">
                                    <img src="{{ asset('/public/lapakdesa/' . $ld->gambar_produk) }}" alt="Awesome Image">
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="{{ route('detail-lapakdesa', ['params' => $ld->slug]) }}"><i
                                                        class="flaticon-nature-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a
                                            href="{{ route('detail-lapakdesa', ['params' => $ld->slug]) }}">{{ $ld->nama_produk }}</a>
                                    </h4>
                                    <p>
                                        {!! \Illuminate\Support\Str::words(strip_tags($ld->deskripsi_produk), 20, '...') !!}
                                    </p>
                                    <div class="link-btn">
                                        <a href="{{ route('detail-lapakdesa', ['params' => $ld->slug]) }}">Lihat Detail<i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="alert alert-warning text-center">
                                <strong>Perhatian!</strong> Data lapak desa belum tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
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
