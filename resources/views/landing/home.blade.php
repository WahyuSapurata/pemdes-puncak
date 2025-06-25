@extends('landing.layouts.layout')
@section('content')
    <!--Main Swiper -->
    <div class="swiper mainswiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide background-overlay"
                style="background-image:url({{ asset('assets-landing/images/slider/1.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">Selamat Datang di Website Resmi Desa Puncak</h1>
                    <p class="animate-text delay-1">Media informasi dan pelayanan digital untuk masyarakat Desa Puncak yang
                        lebih transparan, akuntabel, dan mudah diakses.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="{{ route('hubungi-kami') }}" class="btn contact-btn">Hubungi Kami</a>
                        <a href="{{ route('profil-desa') }}" class="btn service-btn">Profil Desa</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide background-overlay"
                style="background-image:url({{ asset('assets-landing/images/slider/2.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">Pelayanan Publik Cepat dan Transparan</h1>
                    <p class="animate-text delay-1">Nikmati kemudahan layanan administrasi kependudukan, pengajuan surat,
                        dan informasi desa secara online tanpa harus datang ke kantor desa.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="{{ route('hubungi-kami') }}" class="btn contact-btn">Hubungi Kami</a>
                        <a href="{{ route('profil-desa') }}" class="btn service-btn">Profil Desa</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide background-overlay"
                style="background-image:url({{ asset('assets-landing/images/slider/3.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">Mewujudkan Desa Mandiri dan Sejahtera</h1>
                    <p class="animate-text delay-1">Bersama membangun Desa Puncak dengan semangat kebersamaan, gotong
                        royong, dan inovasi menuju masa depan yang lebih baik.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="{{ route('hubungi-kami') }}" class="btn contact-btn">Hubungi Kami</a>
                        <a href="{{ route('profil-desa') }}" class="btn service-btn">Profil Desa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <!--/End Main Swiper -->

    <!--about-seciton-->
    <section class="about-seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <h2>Sambutan Kepala <span>Desa Puncak</span></h2>
                        <h4>{{ optional(
                            $struktu_desa->filter(function ($item) {
                                    return strtolower($item->jabatan) === 'kepala desa';
                                })->first(),
                        )->nama }}
                            <br>
                            <a href="#" style="font-size: 16px">Kepala Desa</a href="#">
                        </h4>
                        <p>Selamat datang di website resmi Pemerintah Desa Puncak. Situs ini merupakan sarana informasi dan
                            komunikasi yang bertujuan untuk menyampaikan berbagai kegiatan, program, serta tata kelola
                            pemerintahan desa secara transparan kepada seluruh masyarakat.</p>
                        <p class="style-2">Melalui media ini, kami berharap seluruh warga dapat mengakses informasi terkait
                            layanan administrasi desa, pembangunan, kegiatan kemasyarakatan, serta berbagai potensi yang
                            dimiliki Desa Puncak.
                        </p>
                        <p class="style-2">Mari bersama-sama kita manfaatkan teknologi dan media sosial secara bijak
                            sebagai alat untuk mempererat silaturahmi, meningkatkan partisipasi warga, serta mendorong
                            kemajuan desa yang mandiri, sejahtera, dan berdaya saing.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <figure class="image-box wow slideInRight  animated">
                            <img style="width: 570px; height: 500px;" loading="lazy"
                                src="{{ asset(
                                    '/public/strukturdesa/' .
                                        optional(
                                            $struktu_desa->filter(function ($item) {
                                                    return strtolower($item->jabatan) === 'kepala desa';
                                                })->first(),
                                        )->foto,
                                ) }}"
                                alt="Welcome Image" class="img-fluid">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End About-seciton-->


    {{-- <!--Service Section-->
    <section class="our-service">
        <div class="container">
            <div class="sec-title">
                <h2>our <span>services</span></h2>
            </div>
            <div class="service-list">
                <div class="swiper serviceswiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="img_holder">
                                    <img loading="lazy" src="{{ asset('assets-landing/images/service/1.jpg') }}"
                                        alt="Awesome Image" />
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="service-single.html"><i class="flaticon-nature-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a href="service-single.html">Landscape Design</a></h4>
                                    <p>Landscape design creates beautiful, functional outdoor spaces for every need.
                                    </p>
                                    <div class="link-btn">
                                        <a href="service-single.html">View Details<i class="fa fa-angle-double-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="img_holder">
                                    <img loading="lazy" src="{{ asset('assets-landing/images/service/2.jpg') }}"
                                        alt="Awesome Image" />
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="service-single.html"><i class="flaticon-nature-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a href="service-single.html">Garden Maintenance</a></h4>
                                    <p>Garden maintenance ensures healthy growth through pruning, weeding, and
                                        proper care.</p>
                                    <div class="link-btn">
                                        <a href="service-single.html">View Details<i class="fa fa-angle-double-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="img_holder">
                                    <img loading="lazy" src="{{ asset('assets-landing/images/service/3.jpg') }}"
                                        alt="Awesome Image" />
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="service-single.html"><i class="flaticon-nature-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a href="service-single.html">Lawn Care Services</a></h4>
                                    <p>Lawn care services maintain healthy, lush lawns through mowing, fertilizing,
                                        and aerating.</p>
                                    <div class="link-btn">
                                        <a href="service-single.html">View Details<i class="fa fa-angle-double-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="img_holder">
                                    <img loading="lazy" src="{{ asset('assets-landing/images/service/4.jpg') }}"
                                        alt="Awesome Image" />
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="service-single.html"><i class="flaticon-nature-6"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a href="service-single.html">Vertical Gardening</a></h4>
                                    <p>Vertical gardening utilizes wall space to grow plants, maximizing limited
                                        areas.</p>
                                    <div class="link-btn">
                                        <a href="service-single.html">View Details<i class="fa fa-angle-double-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="img_holder">
                                    <img loading="lazy" src="{{ asset('assets-landing/images/service/5.jpg') }}"
                                        alt="Awesome Image" />
                                    <div class="overlay">
                                        <div class="inner">
                                            <div class="social">
                                                <a href="service-single.html"><i class="flaticon-nature-6"></i></a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <h4><a href="service-single.html">Rooftop Gardening</a></h4>
                                    <p>Rooftop gardening offers a sustainable way to grow plants in urban spaces.
                                    </p>
                                    <div class="link-btn">
                                        <a href="service-single.html">View Details<i class="fa fa-angle-double-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/end Service Section--> --}}

    <!--Paralax Style-->
    <section class="parallax-style" style="background-image:url({{ asset('assets-landing/images/background/2.jpg') }});">
        <div class="container">
            <!--Fact Counter-->
            <div class="fact-counter">
                <div class="row">
                    <!--Column-->
                    <div class="col-md-3 col-sm-6">
                        <article class="column counter-column wow fadeIn" data-wow-duration="300ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon fa fa-users"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000"
                                            data-stop="{{ $penduduk->total }}">0</span>
                                        <p>Penduduk</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--Column-->
                    <div class="col-md-3 col-sm-6">

                        <article class="column counter-column wow fadeIn" data-wow-duration="600ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon fa fa-user-md"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000"
                                            data-stop="{{ $penduduk->kepala_keluarga }}">0</span>
                                        <p>Kepala Keluarga</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--Column-->
                    <div class="col-md-3 col-sm-6">
                        <article class="column counter-column wow fadeIn" data-wow-duration="900ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon fa fa-male"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000"
                                            data-stop="{{ $penduduk->laki_laki }}">0</span>
                                        <p>Laki-laki</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--Column-->
                    <div class="col-md-3 col-sm-6">
                        <article class="column counter-column wow fadeIn" data-wow-duration="900ms">
                            <div class="item">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <i class="icon fa fa-female"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000"
                                            data-stop="{{ $penduduk->perempuan }}">0</span>
                                        <p>Perempuan</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End Paralax Style-->

    {{-- <!--project Section-->
    <section class="our-project text-center">
        <div class="sec-title">
            <h2>our <span>projects</span></h2>
        </div>
        <div class="container">

            <ul class="post-filter list-inline text-center">
                <li class="list-inline-item active" data-filter=".filter-item">
                    <span>All</span>
                </li>
                <li class="list-inline-item" data-filter=".Gardening">
                    <span>Gardening</span>
                </li>
                <li class="list-inline-item" data-filter=".Lawn">
                    <span>Lawn</span>
                </li>
                <li class="list-inline-item" data-filter=".Cleaning">
                    <span>Cleaning</span>
                </li>
                <li class="list-inline-item" data-filter=".Watering">
                    <span>Watering</span>
                </li>
            </ul>

            <div class="row masonary-layout filter-layout">
                <div class="col-md-4 col-sm-6 filter-item Watering">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/1.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Garden Planning</a></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 filter-item Gardening Lawn Cleaning">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/2.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Hedge cutting</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 filter-item Gardening Lawn Cleaning">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/3.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Seed spreading</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 filter-item Cleaning Watering">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/4.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Tree Planting</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 filter-item Gardening Cleaning Lawn Watering">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/5.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Turf Trimming</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 filter-item Lawn Cleaning">
                    <div class="project-item">
                        <div class="img-holder">
                            <figure><img loading="lazy" src="{{ asset('assets-landing/images/project/6.jpg') }}"
                                    alt="Awesome Image" />
                            </figure>
                            <div class="overlay">
                                <div class="inner">
                                    <a href="single-project.html"><i class="flaticon-nature-5"></i></a>
                                </div>
                            </div>
                            <h4><a href="single-project.html">Crown Reduction</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/project Section--> --}}



    <!--Team-seciton-->
    <section class="team-seciton">
        <div class="container">
            <div class="sec-title">
                <h2>Struktur Organisasi dan Tata Kerja <span>Desa Puncak</span></h2>
            </div>
            <div class="row">
                @forelse ($struktu_desa->take(4) as $sd)
                    <div class="col-lg-3 col-md-6">
                        <div class="team_member">
                            <div class="img_holder">
                                <img loading="lazy" src="{{ asset('/public/strukturdesa/' . $sd->foto) }}"
                                    alt="images">
                                <div class="overlay">
                                    <div class="border">
                                        <div class="icon-holder">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </div>
                                        <div class="icon-holder">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                        <div class="icon-holder">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h4>{{ $sd->nama }}</h4>
                                <span>{{ $sd->jabatan }}</span>
                            </div>
                        </div> <!-- /team_member -->
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning text-center">
                            <strong>Perhatian!</strong> Data struktur organisasi desa belum tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--/End Team-seciton-->


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

    <!--why choose us-->
    <section class="two-column">
        <div class="container">
            <div class="sec-title">
                <h2>APB DESA <span>{{ now()->format('Y') }}</span></h2>
            </div>
            <div class="inner-box">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-sm-12">
                        <div class="content-box">
                            <p>Akses cepat dan transparan terhadap APB Desa serta proyek pembangunan.</p>
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-money"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="#">Pendapatan Desa</a></h4>
                                            <h2 class="fw-bold">Rp
                                                {{ number_format($apbd->total_pendapatan, 0, ',', '.') }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-shopping-cart"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Belanja Desa</a></h4>
                                            <h2 class="fw-bold">Rp
                                                {{ number_format($apbd->total_belanja, 0, ',', '.') }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-line-chart"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Surplus/Defisit</a></h4>
                                            <h2 class="fw-bold">Rp
                                                {{ number_format($apbd->total_pendapatan - $apbd->total_belanja, 0, ',', '.') }}
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <figure class="image-box">
                            <img class="wow slideInRight " loading="lazy"
                                src="{{ asset('assets-landing/images/icons/icon-pendapatan.png') }}" alt="" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/end why choose us-->


    <!--testimonial-seciton-->
    <section class="testimonial">
        <div class="container">
            <div class="sec-title">
                <h2>Galeri Desa</h2>
            </div>
            <div class="swiper testimonialswiper">
                <div class="swiper-wrapper">
                    @forelse ($galeri as $g)
                        <div class="swiper-slide">
                            <div class="single-item">
                                <div class="img-box clearfix">
                                    <img loading="lazy" src="{{ asset('/public/galeri/' . $g->gambar) }}"
                                        alt="Images">
                                </div>
                                <div class="text clearfix">
                                    <h4>{{ $g->judul }}</h4>
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!--/testimonial-seciton-->


    <!--latest-news-->
    <section class="latest-news">
        <div class="container">
            <div class="sec-title">
                <h2>Berita desa<span>terbaru</span></h2>
            </div>
            <div class="item-list">
                <div class="row">
                    @forelse ($berita as $bt)
                        <div class="col-lg-4 col-md-6">
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
                                <strong>Perhatian!</strong> Data berita desa belum tersedia.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!--/End latest-news-->
@endsection
