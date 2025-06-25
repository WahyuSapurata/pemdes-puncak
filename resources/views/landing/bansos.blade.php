@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Program Bansos Desa Puncak melibatkan peran aktif masyarakat dalam mendata dan mengawasi penyaluran
                    bantuan agar tepat sasaran dan bermanfaat bagi warga yang membutuhkan.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('bansos') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <!--Feature Section-->
    <section class="features">
        <div class="container">
            <div class="sec-title">
                <h2>Jumlah Penerima <span>Bansos</span></h2>
            </div>
            <div class="row">
                <!--Start single feature icon-->
                <div class="col-lg-4 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon fa fa-hand-paper-o"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">BLT</a></h4>
                            <p class="fw-bold">{{ $bansos->BLT ? $bansos->BLT : 0 }} Jiwa</p>
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
                            <i class="icon fa fa-home"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">PKH</a></h4>
                            <p class="fw-bold">{{ $bansos->PKH ? $bansos->PKH : 0 }} Jiwa</p>
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
                            <i class="icon fa fa-share-square-o"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">BPNT</a></h4>
                            <p class="fw-bold">{{ $bansos->BPNT ? $bansos->BPNT : 0 }} Jiwa</p>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
            </div>
        </div>
    </section>
    <!--/End Feature Section-->

    <!--Feature Section-->
    <section class="features pt-0">
        <div class="container">
            <div class="sec-title">
                <h2>Cek <span>Penerima Bansos</span></h2>
            </div>
            <div class="row">
                <div class="col-12 default-form">
                    <div class="input-group mb-3" style="flex-wrap: nowrap">
                        <input type="text" id="nikInput" class="form-control"
                            placeholder="Masukkan NIK Penerima Bansos">
                        <div class="input-group-append">
                            <button class="btn-style-one" onclick="cariPenerima()">Cari</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tempat hasilnya akan ditampilkan -->
            <div id="hasilPencarian" class="mt-4"></div>

        </div>
    </section>
    <!--/End Feature Section-->

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
@push('scripts')
    <script>
        function cariPenerima() {
            const nik = $('#nikInput').val();

            if (!nik) {
                alert('Silakan masukkan NIK terlebih dahulu.');
                return;
            }

            $.ajax({
                url: '/get-penerima-bansos/' + nik, // sesuaikan dengan endpoint-mu
                method: 'GET',
                success: function(response) {
                    if (response.data.length === 0) {
                        $('#hasilPencarian').html(
                            '<div class="alert alert-warning">Data tidak ditemukan untuk NIK tersebut.</div>'
                        );
                        return;
                    }

                    const penduduk = response.data[0]; // asumsinya satu penduduk
                    let rows = '';
                    response.data.forEach(item => {
                        rows += `
                        <tr>
                            <td>${item.nama}</td>
                            <td>${item.nik}</td>
                            <td>${item.alamat}</td>
                            <td>${item.jenis_bansos}</td>
                            <td>${item.tahun}</td>
                        </tr>
                    `;
                    });

                    $('#hasilPencarian').html(`
                    <h5 class="mb-2">Hasil Pencarian:</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>Jenis Bansos</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${rows}
                        </tbody>
                    </table>
                `);
                },
                error: function() {
                    $('#hasilPencarian').html(
                        '<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>');
                }
            });
        }
    </script>
@endpush
