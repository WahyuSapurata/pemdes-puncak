@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content mb-2">
                <h2>{{ $module }}</h2>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a href="{{ route('lapakdesa') }}">Lapak Desa</a><i class="fa fa-chevron-right" aria-hidden="true"></i>
                </li>
                <li><a class="active" href="#">Detail Lapak Desa</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="single-service">
        <div class="container">
            <div class="service-content">
                <div class="sec-title">
                    <h2>{{ $data->nama_produk }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box">
                            <div class="d-grid">
                                <span style="font-style: italic; font-size: 12px">Categori :
                                    {{ $data->kategori_produk }}</span>
                                <h6 style="font-weight: 500">Nama penjual :
                                    {{ $data->nama_penjual }}</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 style="font-weight: bold">Rp {{ number_format($data->harga_produk, 0, ',', '.') }}
                                    </h2>
                                    <a href="" class="btn btn-success"><i class="fa fa-whatsapp"
                                            aria-hidden="true"></i> Hubungi penjual</a>
                                </div>
                            </div>
                            <p>
                                {!! $data->deskripsi_produk !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="img-holder">
                            <figure><img src="{{ asset('/public/lapakdesa/' . $data->gambar_produk) }}" alt="Images">
                            </figure>
                        </div>
                    </div>
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
