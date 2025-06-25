@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Halaman kegiatan ini menjadi media untuk menyampaikan kegiatan desa secara terbuka kepada seluruh warga,
                    demi membangun kepercayaan dan partisipasi bersama.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('kegiatan') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="latest-news pb-80">
        <div class="container">
            <div class="item-list">
                <div class="row">
                    @forelse ($kegiatan as $k)
                        <div class="col-lg-4 col-md-6">
                            <div class="item">
                                <figure class="image-box">
                                    <img loading="lazy" src="{{ asset('/public/kegiatan/' . $k->banner) }}">
                                </figure>
                                <div class="content-box">
                                    <ul class="comments">
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $k->waktu }}</li>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $k->tanggal }}</li>
                                    </ul>
                                    <h4><a
                                            href="{{ route('detail-kegiatan', ['params' => $k->slug]) }}">{{ $k->nama_kegiatan }}</a>
                                    </h4>
                                    <p>{!! \Illuminate\Support\Str::words(strip_tags($k->deskripsi), 20, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="alert alert-warning text-center">
                                <strong>Perhatian!</strong> Data kegiatan desa belum tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            @if ($kegiatan->total() > 4)
                <ul class="page_pagination">
                    {{-- Previous --}}
                    @if ($kegiatan->onFirstPage())
                        <li><span class="disabled"><i class="fa fa-angle-left"></i></span></li>
                    @else
                        <li><a href="{{ $kegiatan->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                    @endif

                    {{-- Page numbers --}}
                    @for ($i = 1; $i <= $kegiatan->lastPage(); $i++)
                        <li>
                            <a href="{{ $kegiatan->url($i) }}"
                                class="tran3s {{ $kegiatan->currentPage() == $i ? 'active' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    {{-- Next --}}
                    @if ($kegiatan->hasMorePages())
                        <li><a href="{{ $kegiatan->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                    @else
                        <li><span class="disabled"><i class="fa fa-angle-right"></i></span></li>
                    @endif
                </ul>
            @endif
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
