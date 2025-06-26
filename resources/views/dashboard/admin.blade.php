@extends('layouts.layout')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">
                <!--Begin Admin-->
                @if ($pengajuan_surat)
                    <div class="col-xl-12">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-warning me-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Informasi</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <span>Ada <b class="text-success fs-2">{{ $pengajuan_surat }}</b> informasi surat pengajuan
                                    yang harus
                                    di
                                    setujui
                                    ini hari harap klik <b>Lihat
                                        Surat</b> untuk
                                    detailnya</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                            <div class="ms-auto">
                                <a href="{{ route('admin.surat-pengajuan') }}" class="btn btn-success">Lihat Surat</a>
                            </div>
                        </div>
                        <!--end::Alert-->
                    </div>
                @endif

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="penduduk" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #penduduk {
                                            fill: #f4be2a
                                        }
                                    </style>
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">{{ $penduduk->count() }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Jumlah Data Penduduk
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="kepalakeluarga" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #kepalakeluarga {
                                            fill: #00662a
                                        }
                                    </style>
                                    <path
                                        d="M480 320a96 96 0 1 0 -96-96 96 96 0 0 0 96 96zm48 32a22.9 22.9 0 0 0 -7.1 1.1 124.8 124.8 0 0 1 -81.9 0A22.8 22.8 0 0 0 432 352a112 112 0 0 0 -112 112.6c.1 26.3 21.7 47.4 48 47.4h224c26.3 0 47.9-21.1 48-47.4A112 112 0 0 0 528 352zm-198.1 10.5A145.2 145.2 0 0 1 352 344.6V128a32 32 0 0 0 -32-32h-32V32a32 32 0 0 0 -32-32H96a32 32 0 0 0 -32 32v64H32a32 32 0 0 0 -32 32v368a16 16 0 0 0 16 16h288.3A78.6 78.6 0 0 1 288 464.8a143.1 143.1 0 0 1 41.9-102.3zM144 404a12 12 0 0 1 -12 12H92a12 12 0 0 1 -12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1 -12 12H92a12 12 0 0 1 -12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm48-122a6 6 0 0 1 -6 6h-20a6 6 0 0 1 -6-6v-26h-26a6 6 0 0 1 -6-6v-20a6 6 0 0 1 6-6h26V70a6 6 0 0 1 6-6h20a6 6 0 0 1 6 6v26h26a6 6 0 0 1 6 6v20a6 6 0 0 1 -6 6h-26zm80 250a12 12 0 0 1 -12 12h-40a12 12 0 0 1 -12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12zm0-128a12 12 0 0 1 -12 12h-40a12 12 0 0 1 -12-12v-40a12 12 0 0 1 12-12h40a12 12 0 0 1 12 12z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">
                                {{ $penduduk->where('status_dalam_keluarga', 'kepala Keluarga')->count() }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Jumlah Kepala
                                Keluarga</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="laki-laki" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #laki-laki {
                                            fill: #12f0e5
                                        }
                                    </style>
                                    <path
                                        d="M96 0c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64S60.7 0 96 0m48 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H48c-26.5 0-48 21.5-48 48v136c0 13.3 10.7 24 24 24h16v136c0 13.3 10.7 24 24 24h64c13.3 0 24-10.7 24-24V352h16c13.3 0 24-10.7 24-24V192c0-26.5-21.5-48-48-48z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">
                                {{ $penduduk->where('jenis_kelamin', 'L')->count() }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Jumlah Laki-laki
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="p-2 rounded-circle"
                                style="display: flex; align-items: center; position: absolute; top: 0; right: 0;">
                                <svg id="perempuan" xmlns="http://www.w3.org/2000/svg" height="3em" width="59px"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <style>
                                        #perempuan {
                                            fill: #c412f0
                                        }
                                    </style>
                                    <path
                                        d="M128 0c35.3 0 64 28.7 64 64s-28.7 64-64 64c-35.3 0-64-28.7-64-64S92.7 0 128 0m119.3 354.2l-48-192A24 24 0 0 0 176 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H80a24 24 0 0 0 -23.3 18.2l-48 192C4.9 369.3 16.4 384 32 384h56v104c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24V384h56c15.6 0 27.1-14.7 23.3-29.8z" />
                                </svg>
                            </div>
                            <div class="text-center fw-bold fs-1">
                                {{ $penduduk->where('jenis_kelamin', 'P')->count() }} Orang</div>
                            <div style="font-size: 12px" class="fw-bolder text-center text-capitalize">Jumlah Perempuan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
