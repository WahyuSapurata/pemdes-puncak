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
                <li><a href="{{ route('berita') }}">Berita</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="#">Detail Berita</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <!--blog details-->
    <section class="blog-details">
        <div class="container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="col-lg-8 col-sm-12">

                    <!--Blog Post-->
                    <article class="single-blog-post style-two">
                        <div class="post-inner">
                            <div class="image-box">
                                <figure><a href="#"><img loading="lazy"
                                            src="{{ asset('/public/berita/' . $data->gambar) }}" alt=""></a>
                                </figure>
                            </div>
                            <div class="post-header">
                                <h3>{{ $data->judul }}</h3>
                                <ul class="post-info">
                                    <li><span class="flaticon-black"></span>&ensp; by {{ $data->oleh }}</li>
                                    <li><span class="fa fa-clock-o"></span>&ensp;
                                        {{ $data->created_at->timezone('Asia/Makassar')->format('d M Y') }} </li>
                                </ul>
                            </div>
                            <div class="post-desc">
                                <div class="text">
                                    <p>{!! $data->isi !!}</p>
                                </div>
                            </div>
                            {{-- <blockquote>"Gardening is the purest form of patience — where each seed holds the promise of
                                life, beauty, and growth.
                                In nurturing plants, we learn to nurture ourselves and reconnect with nature’s quiet
                                wisdom."
                                <div class="quate"><i class="fa fa-quote-right" aria-hidden="true"></i></div>
                            </blockquote>
                            <div class="text">
                                <p>Our aim is to make gardening accessible, enjoyable, and rewarding for everyone. Whether
                                    you’re planting your
                                    first seed or managing a full garden, our content is here to guide and grow with you —
                                    one leaf, one flower, one harvest at a time.</p>
                            </div> --}}
                        </div>
                    </article>

                    {{-- <!--Comments Area-->
                    <div class="blog-comments-area">
                        <div class="group-title">
                            <h3>3 Comments</h3>
                        </div>

                        <div class="comment-box">
                            <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="author-thumb"><img src="images/blog/c2.jpg" alt=""></div>
                                <div class="comment-info"><strong>Jubaida Rohman</strong></div>
                                <div class="text">Really loved this gardening post! The tips were practical and easy to
                                    follow. Can’t wait to try them in my own garden. Looking forward to more helpful content
                                    like this!</div>
                                <div class="reply-option text-left">Posted 6 hours ago &ensp; <a
                                        class="theme-btn radial-btn btn-theme-four" href="#"><span
                                            class="txt">Reply</span></a></div>
                            </div>

                            <div class="comment reply-comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="author-thumb"><img src="images/blog/c1.jpg" alt=""></div>
                                <div class="comment-info"><strong>Albart Muzahid</strong></div>
                                <div class="text">Thanks for the simple yet effective advice! The seasonal planting guide
                                    was exactly what I needed. Your blog always inspires me to do more with my little garden
                                    space.</div>
                                <div class="reply-option text-left">Posted 5 hours ago &ensp; <a
                                        class="theme-btn radial-btn btn-theme-four" href="#"><span
                                            class="txt">Reply</span></a></div>
                            </div>

                            <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="author-thumb"><img src="images/blog/c3.jpg" alt=""></div>
                                <div class="comment-info"><strong>Robart Muallim</strong></div>
                                <div class="text">Great article! I especially liked the section on organic methods. It’s
                                    encouraging to see eco-friendly options explained so clearly. Hoping to see more posts
                                    about indoor plants and balcony gardening soon.</div>
                                <div class="reply-option text-left">Posted 4 hours ago &ensp; <a
                                        class="theme-btn btn-theme-four" href="#"><span
                                            class="txt">Reply</span></a></div>
                            </div>

                        </div>
                    </div>

                    <!--leave-comment area-->
                    <div class="leave-comment">
                        <div class="group-title">
                            <h3>Leave a Comment</h3>
                        </div>
                        <div class="default-form-area">
                            <form id="contact-form" name="contact_form" class="default-form" action="sendmail.php"
                                method="post">
                                <div class="row clearfix">

                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <div class="form-group style-two">
                                            <input type="text" name="form_name" class="form-control" value=""
                                                placeholder="Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group style-two">
                                            <input type="email" name="form_email" class="form-control required email"
                                                value="" placeholder="Email" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group style-two">
                                            <textarea name="form_message" class="form-control textarea required" placeholder="Comment"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group style-two">
                                            <input id="form_botcheck" name="form_botcheck" class="form-control"
                                                type="hidden" value="">
                                            <button class="btn-style-one" type="submit"
                                                data-loading-text="Please wait...">send message</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div> --}}

                </div>
                <!--/End Content Side-->

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
