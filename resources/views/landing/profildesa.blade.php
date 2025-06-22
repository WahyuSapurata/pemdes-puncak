@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Membangun Desa Puncak Berbasis Kearifan Lokal Menuju Masa Depan yang Lebih Baik</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('profil-desa') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <!--visimisi-seciton-->
    <section class="visimisi-seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <h2>Visi Desa Puncak</h2>
                        <p>{{ $data->visi }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <h2>Misi Desa Puncak</h2>
                        <ul>
                            @foreach ($data->misi as $m)
                                <li class="d-flex"><i class="fa fa-angle-double-right mr-2" style="margin-top: 4px"></i>
                                    <span>{{ $m['misi'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End visimisi-seciton-->

    <section class="sejarah-seciton">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single-item">
                        <h2>Sejarah <span>Desa Puncak</span></h2>
                        <p>{!! $data->sejarah !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End sejarah-seciton-->

    <section class="bagang-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single-item">
                        <h2>Bagan Struktur Organisasi <span>Desa Puncak</span></h2>
                        <img src="{{ asset('/public/profildesa/' . $data->struktur_organisasi) }}"
                            alt="Bagan Struktur Organisasi" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--about-seciton-->
    <section class="about-seciton about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <h2>Peta Wilayah <span>Desa Puncak</span></h2>
                        <h4>Gambaran wilayah, <a href="#">Desa Puncak</a> dan deskrisi wilayahnya.</h4>
                        <p>{!! $data->wilayah !!}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="single-item">
                        <figure class="image-box wow slideInRight  animated">
                            <div id="map"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/End about-seciton-->

    <!--Team-seciton-->
    <section class="team-seciton">
        <div class="container">
            <div class="sec-title">
                <h2>Struktur Organisasi dan Tata Kerja <span>Desa Puncak</span></h2>
            </div>
            <div class="row">
                @forelse ($struktur_desa as $sd)
                    <div class="col-lg-3 col-md-6">
                        <div class="team_member">
                            <div class="img_holder">
                                <img loading="lazy" src="{{ asset('/public/strukturdesa/' . $sd->foto) }}" alt="images">
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
                    <a href="contact.html" class="btn-style-two pull-right">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!--/End subscribe-us section-->
@endsection
@section('scripts')
    <script>
        const map = L.map('map').setView([{{ $peta['latitude'] }}, {{ $peta['longitude'] }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Marker lokasi peta
        L.marker([{{ $peta['latitude'] }}, {{ $peta['longitude'] }}])
            .addTo(map)
            .bindPopup("{{ $peta['nama'] }}").openPopup();

        // Ambil batas wilayah dari controller (statis)
        fetch('/desa_puncak.geojson')
            .then(res => res.json())
            .then(data => {
                const geoLayer = L.geoJSON(data, {
                    style: {
                        color: 'green',
                        fillColor: '#aaffaa',
                        weight: 2,
                        fillOpacity: 0.5
                    }
                }).addTo(map);

                // Zoom otomatis ke batas geojson
                map.fitBounds(geoLayer.getBounds());
            });
    </script>
@endsection
