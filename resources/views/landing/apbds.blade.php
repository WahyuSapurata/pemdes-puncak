@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Memberikan informasi Transparansi APBDes Desa Puncak,
                    Kami membuka akses informasi anggaran desa sebagai bentuk komitmen terhadap transparansi dan
                    akuntabilitas dalam pengelolaan keuangan desa untuk kemajuan bersama.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('penduduk') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <!--why choose us-->
    <section class="two-column">
        <div class="container">
            <div class="mb-4 pl-0 col-md-12 col-lg-6">
                <label class="fw-bold">Filter Tahun</label>
                <select name="tahun" class="form-control" id="year_select" data-placeholder="Silahkan pilih tahun">
                </select>
            </div>
            <div class="sec-title">
                <h2>APB DESA <span class="tahun"></span></h2>
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
                                                <span id="total-pendapatan"></span>
                                            </h2>
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
                                                <span id="total-belanja"></span>
                                            </h2>
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
                                                <span id="defisit"></span>
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

    <!--project Section-->
    <section class="two-column">
        <div class="container">
            <div class="sec-title">
                <h2>Pendapatan dan Belanja Desa Tahun <span class="tahun"></span></h2>
            </div>
            <!-- Kelompok Umur -->
            <div class="row" style="gap: 20px">
                <div class="col-12">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Pendapatan</h4>
                        <div style="height: 400px">
                            <canvas id="pendapatanChart" height="500"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Belanja</h4>
                        <div style="height: 400px">
                            <canvas id="belanjaChart" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/project Section-->

    <!--subscribe-us section-->
    <section class="subscribe-us mt-5">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('year_select');
            const currentYear = new Date().getFullYear();

            for (let year = 2000; year <= currentYear; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;

                if (year === currentYear) {
                    option.selected = true;
                }

                select.appendChild(option);
            }

            document.querySelectorAll('.tahun').forEach(function(el) {
                el.textContent = currentYear;
            });

            // Kirim ke backend saat halaman pertama kali diload
            kirimTahunKeBackend(currentYear);

            // Kirim ke backend saat user mengganti tahun
            select.addEventListener('change', function() {
                const selectedYear = this.value;
                if (selectedYear) {
                    kirimTahunKeBackend(selectedYear);
                }
            });

            let chartPendapatan = null;
            let chartBelanja = null;

            function kirimTahunKeBackend(tahun) {
                fetch('/apbds-by-tahun/' + tahun)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const apbds = data.data;

                            let totalPendapatan = 0;
                            let totalBelanja = 0;

                            // Untuk grafik pendapatan & belanja
                            const labelsPendapatan = [];
                            const dataPendapatan = [];

                            const labelsBelanja = [];
                            const dataBelanja = [];

                            apbds.forEach(item => {
                                const jumlah = parseInt(item.jumlah);

                                if (item.jenis === 'pendapatan') {
                                    totalPendapatan += jumlah;

                                    labelsPendapatan.push(item.sumber);
                                    dataPendapatan.push(jumlah);
                                } else if (item.jenis === 'belanja') {
                                    totalBelanja += jumlah;

                                    labelsBelanja.push(item.sumber);
                                    dataBelanja.push(jumlah);
                                }
                            });

                            const defisit = totalPendapatan - totalBelanja;

                            // Tampilkan ke UI
                            document.getElementById('total-pendapatan').textContent = formatRupiah(
                                totalPendapatan);
                            document.getElementById('total-belanja').textContent = formatRupiah(totalBelanja);
                            document.getElementById('defisit').textContent = formatRupiah(defisit);

                            // Tampilkan grafik
                            tampilkanGrafikPendapatan(labelsPendapatan, dataPendapatan);
                            tampilkanGrafikBelanja(labelsBelanja, dataBelanja);
                        } else {
                            console.error('Respon gagal:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Gagal mengambil data APBDS:', error);
                    });
            }

            function tampilkanGrafikPendapatan(labels, data) {
                const ctx = document.getElementById('pendapatanChart').getContext('2d');

                // Hapus chart lama jika ada
                if (chartPendapatan !== null) {
                    chartPendapatan.destroy();
                }

                chartPendapatan = new Chart(ctx, {
                    type: 'bar', // Bisa diganti 'line' jika perlu
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pendapatan',
                            data: data,
                            borderColor: '#007bff',
                            backgroundColor: 'rgba(0, 123, 255, 0.5)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah (Rp)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Sumber Dana'
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Rp ${formatRupiah(context.parsed.y)}`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            function tampilkanGrafikBelanja(labels, data) {
                const ctx = document.getElementById('belanjaChart').getContext('2d');

                // Hapus chart lama jika ada
                if (chartBelanja !== null) {
                    chartBelanja.destroy();
                }

                chartBelanja = new Chart(ctx, {
                    type: 'line', // Bisa diganti 'line' jika perlu
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Belanja',
                            data: data,
                            borderColor: '#00923f',
                            backgroundColor: 'rgba(65, 182, 74, 0.5)',
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah (Rp)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Sumber Dana'
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Rp ${formatRupiah(context.parsed.y)}`;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            function formatRupiah(angka) {
                return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        });
    </script>
@endpush
