@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Kami terbuka untuk kritik, saran, maupun informasi yang ingin Anda sampaikan. Mari bersama membangun Desa
                    Puncak menjadi lebih baik.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('hubungi-kami') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="contact_us">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Isi Form Untuk <span>Hubungi Kami</span></h2>
            </div>
            <div class="default-form-area">
                <form id="contact-form" class="default-form" action="{{ route('add-pesan') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-6 col-sm-12">

                            <div class="form-group style-two">
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anda"
                                    required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group style-two">
                                <input type="email" name="email" class="form-control required email"
                                    placeholder="Masukkan email anda" required="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group style-two">
                                <input type="text" name="nomor" class="form-control" placeholder="Masukkan nomor anda">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group style-two">
                                <textarea name="pesan" class="form-control textarea required" placeholder="Masukkan pesan yang ingin anda sampaikan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section-btn text-center">
                        <div class="form-group style-two">
                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden">
                            <button class="btn-style-one" type="submit" data-loading-text="Please wait...">Kirim
                                Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
