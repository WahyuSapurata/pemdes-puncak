@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Melalui halaman berita ini, kami berbagi cerita, prestasi, dan dinamika yang terjadi di tengah-tengah
                    masyarakat Desa Puncak. Jadikan ini sebagai ruang bersama untuk tetap terhubung dan berkembang.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('berita') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <!--latest-news-->
    <section class="latest-news with-sidebar">
        <div class="container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="blog-post col-lg-8 col-sm-12">

                    <div class="item-list">
                        <div class="row">

                            @forelse ($berita as $bt)
                                <div class="col-lg-6 col-md-6">
                                    <div class="item">
                                        <figure class="image-box">
                                            <img loading="lazy" src="{{ asset('/public/berita/' . $bt->gambar) }}">
                                        </figure>
                                        <div class="content-box">
                                            <ul class="comments">
                                                <li><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i>{{ $bt->created_at->timezone('Asia/Makassar')->format('d M Y') }}
                                                </li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i> {{ $bt->oleh }}
                                                </li>
                                            </ul>
                                            <h4><a
                                                    href="{{ route('detail-berita', ['params' => $bt->slug]) }}">{{ $bt->judul }}</a>
                                            </h4>
                                            <p>
                                                {!! \Illuminate\Support\Str::words(strip_tags($bt->isi), 20, '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-warning text-center">
                                        <strong>Perhatian!</strong>
                                        @if (request('keyword'))
                                            Tidak ditemukan hasil pencarian untuk:
                                            <strong>{{ request('keyword') }}</strong>.
                                        @else
                                            Data berita desa belum tersedia.
                                        @endif
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    @if ($berita->total() > 4)
                        <ul class="page_pagination">
                            {{-- Previous --}}
                            @if ($berita->onFirstPage())
                                <li><span class="disabled"><i class="fa fa-angle-left"></i></span></li>
                            @else
                                <li><a href="{{ $berita->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                            @endif

                            {{-- Page numbers --}}
                            @for ($i = 1; $i <= $berita->lastPage(); $i++)
                                <li>
                                    <a href="{{ $berita->url($i) }}"
                                        class="tran3s {{ $berita->currentPage() == $i ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor

                            {{-- Next --}}
                            @if ($berita->hasMorePages())
                                <li><a href="{{ $berita->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                            @else
                                <li><span class="disabled"><i class="fa fa-angle-right"></i></span></li>
                            @endif
                        </ul>
                    @endif

                </div>
                <!--Content Side-->

                <!--Sidebar-->
                <div class="col-lg-4 col-sm-12">
                    <aside class="sidebar">
                        <div class="sidebar_search">
                            <form action="{{ route('berita') }}" method="GET">
                                <input type="text" name="keyword" placeholder="Search...."
                                    value="{{ request('keyword') }}">
                                <button class="tran3s color1_bg"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- Recent Posts -->
                        <div class="recent-news wow fadeInUp" data-wow-duration="1200ms"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <div class="sidebar-title">
                                <h3>Berita Terkini</h3>
                            </div>
                            @forelse ($beritaTerkini as $bt)
                                <div class="single-news">
                                    <figure class="image-holder">
                                        <a href="#"><img loading="lazy"
                                                src="{{ asset('/public/berita/' . $bt->gambar) }}"></a>
                                    </figure>
                                    <div class="text">
                                        <h4><a
                                                href="{{ route('detail-berita', ['params' => $bt->slug]) }}">{{ $bt->judul }}</a>
                                        </h4>
                                        <p><i class="fa fa-clock-o"
                                                aria-hidden="true"></i>{{ $bt->created_at->timezone('Asia/Makassar')->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-warning text-center">
                                        <strong>Perhatian!</strong> Data berita desa belum tersedia.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </aside>
                </div>
                <!--Sidebar-->
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
