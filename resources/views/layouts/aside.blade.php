@php
    $path = explode('/', Request::path());
    $role = auth()->user()->role;

    $dashboardRoutes = [
        'admin' => 'admin.dashboard-admin',
    ];

    $isActive = in_array($role, array_keys($dashboardRoutes)) && isset($path[1]) && $path[1] === 'dashboard-' . $role;
    $activeColor = $isActive ? 'color: #F4BE2A' : 'color: #FFFFFF';
@endphp

<div class="aside-menu bg-primary flex-column-fluid" style="background: linear-gradient(to bottom, #045126, #d6a62d);">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y mb-5 mb-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <script>
            // Ambil elemen menu menggunakan JavaScript
            var menu = document.getElementById('kt_aside_menu_wrapper');

            // Set tinggi maksimum dan penanganan overflow menggunakan JavaScript
            if (menu) {
                menu.style.maxHeight = '88vh'; // Set tinggi maksimum
            }
        </script>
        <!--begin::Menu-->
        <div class="menu menu-column mt-2 menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="kt_aside_menu" data-kt-menu="true" style="gap: 3px;">

            <div class="menu-item">
                <a class="menu-link {{ $isActive ? 'active' : ($module = 'Persetujun PO') }}"
                    href="{{ route($dashboardRoutes[$role]) }}">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <img src="{{ $isActive ? url('assets/media/icons/aside/dashboardact.svg') : url('assets/media/icons/aside/dashboarddef.svg') }}"
                                alt="">
                        </span>
                    </span>
                    <span class="menu-title" style="{{ $activeColor }}">Dashboard</span>
                </a>
            </div>

            @if ($role === 'admin')
                <div class="menu-item menu-link-indention menu-accordion {{ $path[1] == 'infografis' ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#" class="menu-link py-3 {{ $path[1] == 'infografis' ? 'active' : '' }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <img src="{{ $path[1] == 'infografis' ? url('assets/media/icons/aside/masterdataact.svg') : url('/assets/media/icons/aside/masterdatadef.svg') }}"
                                    alt="">
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ $path[1] == 'infografis' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Infografis</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link {{ isset($path[2]) && $path[2] === 'penduduk' ? 'active' : '' }}"
                                href="{{ route('admin.penduduk') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'penduduk'
                                            ? '<i class="fas fa-users-cog" style="color: #F4BE2A; font-size: 16px"></i>'
                                            : '<i class="fas fa-users-cog" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title"
                                    style="{{ isset($path[2]) && $path[2] === 'penduduk' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Penduduk</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>

                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link {{ isset($path[2]) && $path[2] === 'apbds' ? 'active' : '' }}"
                                href="{{ route('admin.apbds') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'apbds'
                                            ? '<i class="fas fa-funnel-dollar" style="color: #F4BE2A; font-size: 16px"></i>'
                                            : '<i class="fas fa-funnel-dollar" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title"
                                    style="{{ isset($path[2]) && $path[2] === 'apbds' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">APBDS</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link {{ isset($path[2]) && $path[2] === 'penerima-bansos' ? 'active' : '' }}"
                                href="{{ route('admin.penerima-bansos') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'penerima-bansos'
                                            ? '<i class="fas fa-hand-holding-usd" style="color: #F4BE2A; font-size: 16px"></i>'
                                            : '<i class="fas fa-hand-holding-usd" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title"
                                    style="{{ isset($path[2]) && $path[2] === 'penerima-bansos' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Bansos</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link {{ isset($path[2]) && $path[2] === 'riwayat-penduduk' ? 'active' : '' }}"
                                href="{{ route('admin.riwayat-penduduk') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'riwayat-penduduk'
                                            ? '<i class="fas fa-id-badge" style="color: #F4BE2A; font-size: 16px"></i>'
                                            : '<i class="fas fa-id-badge" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title"
                                    style="{{ isset($path[2]) && $path[2] === 'riwayat-penduduk' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Riwayat
                                    Penduduk</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--begin::Menu sub-->
                    <div class="menu-sub gap-2 menu-sub-accordion my-2">
                        <!--begin::Menu item-->
                        <div class="menu-item pe-0">
                            <a class="menu-link {{ isset($path[2]) && $path[2] === 'sdgs' ? 'active' : '' }}"
                                href="{{ route('admin.sdgs') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        {!! isset($path[2]) && $path[2] === 'sdgs'
                                            ? '<i class="fas fa-bullseye" style="color: #F4BE2A; font-size: 16px"></i>'
                                            : '<i class="fas fa-bullseye" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title"
                                    style="{{ isset($path[2]) && $path[2] === 'sdgs' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">SDGs</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                </div>

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'berita' ? 'active' : '' }}"
                        href="{{ route('admin.berita') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'berita'
                                    ? '<i class="fas fa-newspaper" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-newspaper" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'berita' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Manajemenet
                            Berita</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'pengumuman' ? 'active' : '' }}"
                        href="{{ route('admin.pengumuman') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'pengumuman'
                                    ? '<i class="fas fa-bullhorn" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-bullhorn" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'pengumuman' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Pengumuman</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'kegiatan' ? 'active' : '' }}"
                        href="{{ route('admin.kegiatan') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'kegiatan'
                                    ? '<i class="fas fa-hiking" style="color: #F4BE2A; font-size: 17px"></i>'
                                    : '<i class="fas fa-hiking" style="color: #FFFFFF; font-size: 17px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'kegiatan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Kegiatan</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'galeri' ? 'active' : '' }}"
                        href="{{ route('admin.galeri') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'galeri'
                                    ? '<i class="fas fa-images" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-images" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'galeri' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Galeri</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'profil-desa' ? 'active' : '' }}"
                        href="{{ route('admin.profil-desa') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'profil-desa'
                                    ? '<i class="fas fa-id-card" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-id-card" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'profil-desa' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Profil
                            Desa</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'struktur-desa' ? 'active' : '' }}"
                        href="{{ route('admin.struktur-desa') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'struktur-desa'
                                    ? '<i class="fas fa-sitemap" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-sitemap" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'struktur-desa' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Struktur
                            Desa</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'lapak-desa' ? 'active' : '' }}"
                        href="{{ route('admin.lapak-desa') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'lapak-desa'
                                    ? '<i class="fas fa-store" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-store" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'lapak-desa' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Lapak
                            Desa</span>
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item">
                    <a class="menu-link {{ isset($path[1]) && $path[1] === 'aduan' ? 'active' : '' }}"
                        href="{{ route('admin.aduan') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                {!! isset($path[1]) && $path[1] === 'aduan'
                                    ? '<i class="fas fa-envelope" style="color: #F4BE2A; font-size: 16px"></i>'
                                    : '<i class="fas fa-envelope" style="color: #FFFFFF; font-size: 16px"></i>' !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title"
                            style="{{ isset($path[1]) && $path[1] === 'aduan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Aduan</span>
                    </a>
                </div>
                <!--end::Menu item-->
            @endif

            {{-- <div class="menu-item">
                <a class="menu-link  {{ $path[0] === 'ubahpassword' ? 'active' : '' }}"
                    href="{{ route('ubahpassword') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2">
                            <img src="{{ $path[0] === 'ubahpassword' ? url('admin/assets/media/icons/aside/ubahpasswordact.svg') : url('/admin/assets/media/icons/aside/ubahpassworddef.svg') }}"
                                alt="">
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title"
                        style="{{ $path[0] === 'ubahpassword' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Ubah
                        Password</span>
                </a>
            </div> --}}

        </div>
        <!--end::Menu-->
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function() {
            // $(".menu-link").hover(function(){
            //     $(this).css("background", "#282EAD");
            // }, function(){
            //     $(this).css("background", "none");
            // });
        });
    </script>
@endsection
