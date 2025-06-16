@extends('landing.layouts.layout')
@section('content')
    <!--Main Swiper -->
    <div class="swiper mainswiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background-image:url({{ asset('assets-landing/images/slider/1.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">Transform Your Space Into a Peaceful Garden Retreat</h1>
                    <p class="animate-text delay-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="contact.html" class="btn contact-btn">Contact Us</a>
                        <a href="service.html" class="btn service-btn">Our Services</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide"
                style="background-image:url({{ asset('assets-landing/images/slider/2.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">Crafting Outdoor Spaces That Inspire and Breathe</h1>
                    <p class="animate-text delay-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="contact.html" class="btn contact-btn">Contact Us</a>
                        <a href="service.html" class="btn service-btn">Our Services</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide"
                style="background-image:url({{ asset('assets-landing/images/slider/3.jpg') }});">
                <div class="slide-content">
                    <h1 class="animate-text">We Turn Bare Spaces Into Blooming Landscapes</h1>
                    <p class="animate-text delay-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="slide-buttons animate-text delay-2">
                        <a href="contact.html" class="btn contact-btn">Contact Us</a>
                        <a href="service.html" class="btn service-btn">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <!--/End Main Swiper -->

    <!--Feature Section-->
    <section class="features">
        <div class="container">
            <div class="row">
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon flaticon-nature-4"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">Landscape Design</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="flaticon-watering-can"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">Watering Garden</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="flaticon-nature-1"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">Tree Plantation</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="flaticon-nature-3"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">Proper Take Care</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="flaticon-people"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">expert worker</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="flaticon-tool-1"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="service-single.html">Clean Working</a></h4>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
            </div>
        </div>
    </section>
    <!--/End Feature Section-->

    <!--about-seciton-->
    <section class="about-seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <h2>Create a Greener Village with <span>Tree Plantation!</span></h2>
                        <h4>Creating beautiful, <a href="#">sustainable gardens</a> with care and creativity.
                        </h4>
                        <p>Discover Our Passion for Transforming Outdoor Spaces into Lush, Vibrant Gardens that
                            Breathe Life, Beauty, and Serenity into Every Home and Community.</p>
                        <p class="style-2">We help turn empty yards and rooftops into peaceful, green spaces full
                            of life.
                            At GreenVista, we mix creativity and nature to build gardens that match your style and
                            needs.
                        </p>

                        <div class="link_btn">
                            <a href="about.html" class="btn-style-one">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <figure class="image-box wow slideInRight  animated">
                            <img src="{{ asset('assets-landing/images/welcome/2.jpg') }}" alt="Welcome Image"
                                class="img-fluid">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End About-seciton-->


    <!--Service Section-->
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
                                    <img src="{{ asset('assets-landing/images/service/1.jpg') }}" alt="Awesome Image" />
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
                                    <img src="{{ asset('assets-landing/images/service/2.jpg') }}" alt="Awesome Image" />
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
                                    <img src="{{ asset('assets-landing/images/service/3.jpg') }}" alt="Awesome Image" />
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
                                    <img src="{{ asset('assets-landing/images/service/4.jpg') }}" alt="Awesome Image" />
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
                                    <img src="{{ asset('assets-landing/images/service/5.jpg') }}" alt="Awesome Image" />
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
    <!--/end Service Section-->

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
                                        <i class="icon flaticon-black"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="2500">0</span>
                                        <p>Happy Clients</p>
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
                                        <i class="icon flaticon-trophy"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="950">0</span>
                                        <p>Awards Win</p>
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
                                        <i class="icon flaticon-nature-5"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="1650">0</span>
                                        <p>Projects Done</p>
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
                                        <i class="icon flaticon-people-1"></i>
                                    </div>
                                    <div class="count-outer">
                                        <span class="count-text" data-speed="3000" data-stop="1650">0</span>
                                        <p>Our Worker</p>
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

    <!--project Section-->
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
                            <figure><img src="{{ asset('assets-landing/images/project/1.jpg') }}" alt="Awesome Image" />
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
                            <figure><img src="{{ asset('assets-landing/images/project/2.jpg') }}" alt="Awesome Image" />
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
                            <figure><img src="{{ asset('assets-landing/images/project/3.jpg') }}" alt="Awesome Image" />
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
                            <figure><img src="{{ asset('assets-landing/images/project/4.jpg') }}" alt="Awesome Image" />
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
                            <figure><img src="{{ asset('assets-landing/images/project/5.jpg') }}" alt="Awesome Image" />
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
                            <figure><img src="{{ asset('assets-landing/images/project/6.jpg') }}" alt="Awesome Image" />
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
    <!--/project Section-->



    <!--Team-seciton-->
    <section class="team-seciton">
        <div class="container">
            <div class="sec-title">
                <h2>our <span>team</span></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="team_member">
                        <div class="img_holder">
                            <img src="{{ asset('assets-landing/images/team/1.jpg') }}" alt="images">
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
                            <h4>Albart Muzaddid</h4>
                            <span>Senior Worker</span>
                            <p>Maximizing growth with expert techniques.</p>
                        </div>
                    </div> <!-- /team_member -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team_member">
                        <div class="img_holder">
                            <img src="{{ asset('assets-landing/images/team/2.jpg') }}" alt="images">
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
                            <h4>Jannati Zaman</h4>
                            <span>Senior Worker</span>
                            <p>Quick, skilled, and environment-loving team.</p>
                        </div>
                    </div> <!-- /team_member -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team_member">
                        <div class="img_holder">
                            <img src="{{ asset('assets-landing/images/team/3.jpg') }}" alt="images">
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
                            <h4>Robart Hafizur</h4>
                            <span>Senior Worker</span>
                            <p>Dedicated to eco-friendly gardening practices.</p>
                        </div>
                    </div> <!-- /team_member -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team_member">
                        <div class="img_holder">
                            <img src="{{ asset('assets-landing/images/team/4.jpg') }}" alt="images">
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
                            <h4>Farzana Rohman</h4>
                            <span>Senior Worker</span>
                            <p>Passionate about sustainable gardening solutions.</p>
                        </div>
                    </div> <!-- /team_member -->
                </div>
            </div>
        </div>
    </section>
    <!--/End Team-seciton-->


    <!--subscribe-us section-->
    <section class="subscribe-us">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3>Plant More Trees, Build a Greener Tomorrow</h3>
                    <p>We offer comprehensive landscaping with every detail designed by our experienced
                        professionals.</p>
                </div>
                <div class="col-md-3">
                    <a href="contact.html" class="btn-style-two pull-right">contact us</a>
                </div>
            </div>
        </div>
    </section>
    <!--/End subscribe-us section-->

    <!--why choose us-->
    <section class="two-column">
        <div class="container">
            <div class="sec-title">
                <h2>why <span>choose us</span></h2>
            </div>
            <div class="inner-box">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="content-box">
                            <p>We deliver complete landscaping services with custom designs, trusted experts, and
                                eco-friendly methods.</p>
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-nature-5"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Tree Plantation</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-people-1"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">expert worker</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-nature-2"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Proper Take Care</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-nature-4"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Landscape Design</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-watering-can"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Watering Garden</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon flaticon-tool-1"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Clean Working</a></h4>
                                            <p>Lorem ipsum dolor sit amet con sectetur adipisicing elit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <figure class="image-box">
                            <img class="wow slideInRight " src="{{ asset('assets-landing/images/service/3.png') }}"
                                alt="" />
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
                <h2>Testimonials</h2>
            </div>
            <div class="swiper testimonialswiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-item">
                            <div class="img-box clearfix">
                                <img src="{{ asset('assets-landing/images/service/2.png') }}" alt="Images">
                            </div>
                            <div class="text clearfix">
                                <h4>Sayeda Khanom</h4>
                                <div class="icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h3>Highly recommended service.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <img src="{{ asset('assets-landing/images/resources/tes.png') }}" alt="Images">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-item">
                            <div class="img-box clearfix">
                                <img src="{{ asset('assets-landing/images/service/6.png') }}" alt="Images">
                            </div>
                            <div class="text clearfix">
                                <h4>Albart Muzaddid</h4>
                                <div class="icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h3>Excellent gardening help.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <img src="{{ asset('assets-landing/images/resources/tes2.png') }}" alt="Images">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-item">
                            <div class="img-box clearfix">
                                <img src="{{ asset('assets-landing/images/service/7.png') }}" alt="Images">
                            </div>
                            <div class="text clearfix">
                                <h4>Firoz Mustahid</h4>
                                <div class="icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h3>Great garden support!</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <img src="{{ asset('assets-landing/images/resources/tes3.png') }}" alt="Images">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-item">
                            <div class="img-box clearfix">
                                <img src="{{ asset('assets-landing/images/service/8.png') }}" alt="Images">
                            </div>
                            <div class="text clearfix">
                                <h4>Will Hafiz</h4>
                                <div class="icon">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h3>Truly impressive work.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <img src="{{ asset('assets-landing/images/resources/tes3.png') }}" alt="Images">
                            </div>
                        </div>
                    </div>

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
                <h2>latest <span>news</span></h2>
            </div>
            <div class="item-list">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <figure class="image-box">
                                <img src="{{ asset('assets-landing/images/blog/1.jpg') }}">
                            </figure>
                            <div class="content-box">
                                <ul class="comments">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>03 May 25</li>
                                    <li><i class="fa fa-comments" aria-hidden="true"></i>4 Comments</li>
                                </ul>
                                <h4><a href="blog-details.html">Garden Maintenance Checklist for Every Season</a>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <figure class="image-box">
                                <img src="{{ asset('assets-landing/images/blog/2.jpg') }}">
                            </figure>
                            <div class="content-box">
                                <ul class="comments">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>03 May 25</li>
                                    <li><i class="fa fa-comments" aria-hidden="true"></i>4 Comments</li>
                                </ul>
                                <h4><a href="blog-details.html">Common Gardening Mistakes and How to Avoid</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <figure class="image-box">
                                <img src="{{ asset('assets-landing/images/blog/3.jpg') }}">
                            </figure>
                            <div class="content-box">
                                <ul class="comments">
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>03 May 25</li>
                                    <li><i class="fa fa-comments" aria-hidden="true"></i>4 Comments</li>
                                </ul>
                                <h4><a href="blog-details.html">Best Watering Practices for Healthy Plant
                                        Growth</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End latest-news-->
@endsection
