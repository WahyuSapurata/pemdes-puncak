<!-- Header Top start -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <!--Top Left-->
            <div class="col-lg-3 col-md-12 top-left d-flex align-items-center">
                <p>
                    Pengumuman <span>Desa Puncak!</span>
                </p>
            </div>
            <!--Top Right-->
            <div class="col-lg-9 col-md-12 d-flex align-items-center">
                <marquee class="fw-bold" behavior="scroll" direction="left">
                    @php
                        $pengumuman = \App\Models\Pengumuman::where('status', 'aktif')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp
                    @forelse ($pengumuman as $pengumumanItem)
                        <span class="text-info">{{ $pengumumanItem->judul }}</span>
                        <span class="text-white">{{ strip_tags($pengumumanItem->isi) }}</span>
                        <span
                            class="text-white">({{ $pengumumanItem->tanggal_mulai . ' - ' . $pengumumanItem->tanggal_selesai }})</span>
                        @if (!$loop->last)
                            <span class="text-white"> | </span>
                        @endif
                    @empty
                        <span class="text-warning">Tidak ada pengumuman saat ini.</span>
                    @endforelse
                </marquee>
            </div>
        </div>
    </div>
</div><!-- Header Top End -->


<!-- MAIN MENU -->
<header class="main-header">
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container clearfix">
            <div class="header-inner clearfix">
                <div class="logo-outer">
                    <div class="logo"><a class="d-flex align-items-center" href="index.html">
                            <img style="height: 55px" src="{{ asset('logo-sinjai.png') }}" alt=""
                                title="">
                            <div
                                style="color: #161414; font-size: 25px; line-height: 25px; font-weight: bold; font-style: italic;">
                                Pemdes <br> Puncak</div>
                        </a></div>
                </div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-lg ml-md-auto">
                    <div class="navbar-header clearfix">
                        <div class="logo"><a href="index.html"><img src="{{ asset('logo-sinjai.png') }}"
                                    alt="" title=""></a></div>
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse-one">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a
                                    href="{{ route('home') }}">Home</a></li>
                            <li class="{{ request()->routeIs('profil-desa') ? 'current' : '' }}"><a
                                    href="{{ route('profil-desa') }}">Profil Desa</a></li>

                            <li
                                class="dropdown {{ request()->routeIs('penduduk') || request()->routeIs('apbds') || request()->routeIs('bansos') || request()->routeIs('sdgs') ? 'current' : '' }}">
                                <a href="#">Infografis</a>
                                <ul>
                                    <li><a href="{{ route('penduduk') }}">Penduduk</a></li>
                                    <li><a href="{{ route('apbds') }}">APBDS</a></li>
                                    <li><a href="{{ route('bansos') }}">Bansos</a></li>
                                    <li><a href="{{ route('sdgs') }}">SDGs</a></li>
                                </ul>
                            </li>
                            <li class="{{ request()->routeIs('berita') ? 'current' : '' }}"><a
                                    href="{{ route('berita') }}">Berita</a></li>
                            <li class="{{ request()->routeIs('kegiatan') ? 'current' : '' }}"><a
                                    href="{{ route('kegiatan') }}">Kegiatan</a></li>
                            <li class="{{ request()->routeIs('galeri') ? 'current' : '' }}"><a
                                    href="{{ route('galeri') }}">Galeri</a></li>
                            <li class="{{ request()->routeIs('lapakdesa') ? 'current' : '' }}"><a
                                    href="{{ route('lapakdesa') }}">Lapak Desa</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->
                <!-- Menu buttons-->
                <div class="menu-button">
                    <a href="{{ route('hubungi-kami') }}" class="btn-style-one">Ajukan Permohonan</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>
<!--/End MAIN MENU -->
