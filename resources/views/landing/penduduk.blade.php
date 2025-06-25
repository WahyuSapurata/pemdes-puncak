@extends('landing.layouts.layout')
@section('content')
    <!--Start page-banner-->
    <section class="page-banner" style="background-image:url({{ asset('assets-landing/images/resources/banner.jpg') }});">
        <div class="container">
            <div class="content">
                <h2>{{ $module }}</h2>
                <p>Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah. Mulai dari jumlah
                    penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting lainnya yang
                    menggambarkan komposisi populasi secara rinci.</p>
            </div>
            <ul class="breadcumb">
                <li><a href="{{ route('home') }}">Home</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                <li><a class="active" href="{{ route('penduduk') }}">{{ $module }}</a></li>
            </ul>
        </div>
    </section>
    <!--End page-banner-->

    <section class="two-column">
        <div class="container">
            <div class="sec-title">
                <h2>Jumlah Penduduk dan <span>Kepala Keluarga</span></h2>
            </div>
            <div class="inner-box">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="content-box">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-users"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Total Penduduk</a></h4>
                                            <p style="font-weight: bold">{{ $penduduk->total }} Jiwa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-user-md"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Kepala Keluarga</a></h4>
                                            <p style="font-weight: bold">{{ $penduduk->kepala_keluarga }} Jiwa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-male"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Laki-laki</a></h4>
                                            <p style="font-weight: bold">{{ $penduduk->laki_laki }} Jiwa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="single-choose-item">
                                        <div class="choose-left-bg"></div>
                                        <div class="choose-icon">
                                            <i class="icon fa fa-female"></i>
                                        </div>
                                        <div class="choose-text">
                                            <h4><a href="service-single.html">Perempuan</a></h4>
                                            <p style="font-weight: bold">{{ $penduduk->perempuan }} Jiwa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <figure class="image-box">
                            <img class="wow slideInRight  animated" src="{{ asset('assets-landing/images/service/3.png') }}"
                                alt="" style="visibility: visible; animation-name: slideInRight;">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--project Section-->
    <section class="our-project text-center">
        <div class="container">

            <!-- Filter tombol -->
            <ul class="post-filter list-inline text-center mb-4">
                <li class="list-inline-item active" data-filter=".kelompok">
                    <span>Kelompok</span>
                </li>
                <li class="list-inline-item" data-filter=".dusun">
                    <span>Dusun</span>
                </li>
                <li class="list-inline-item" data-filter=".pendidikan">
                    <span>Pendidikan</span>
                </li>
                <li class="list-inline-item" data-filter=".pekerjaan">
                    <span>Pekerjaan</span>
                </li>
                <li class="list-inline-item" data-filter=".wajib-pilih">
                    <span>Wajib Pilih</span>
                </li>
                <li class="list-inline-item" data-filter=".perkawinan">
                    <span>Perkawinan</span>
                </li>
                <li class="list-inline-item" data-filter=".agama">
                    <span>Agama</span>
                </li>
            </ul>

            <!-- Chart konten -->
            <div class="row filter-layout">
                <!-- Kelompok Umur -->
                <div class="col-12 kelompok">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan Kelompok Umur</h4>
                        <canvas id="pyramidChart" height="500"></canvas>
                    </div>
                </div>

                <!-- Dusun -->
                <div class="col-12 dusun">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-4 text-center">Berdasarkan Dusun</h4>
                        <div style="height: 400px; display: flex; justify-content: center; gap: 20px">
                            <canvas id="dusunChart"></canvas>
                            <div>
                                <h5 class="fw-bold mb-3">Keterangan:</h5>
                                <ul id="legendList" class="list-unstyled small" style="padding-left: 0; margin: 0;">
                                    <!-- Akan diisi oleh JS -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelompok Umur -->
                <div class="col-12 pendidikan">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan pendidikan</h4>
                        <div style="height: 400px">
                            <canvas id="pendidikanChart" height="500"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Kelompok Umur -->
                <div class="col-12 pekerjaan">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan pekerjaan</h4>
                        <div style="height: 400px">
                            <canvas id="pekerjaanChart" height="500"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Kelompok Umur -->
                <div class="col-12 wajib-pilih">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan Wajib Pilih</h4>
                        <div style="height: 400px">
                            <canvas id="wajibPilihChart" height="500"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Kelompok Umur -->
                <div class="col-12 perkawinan">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan Perkawinan</h4>
                        <div style="height: 400px">
                            <canvas id="PerkawinanChart" height="500"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Kelompok Umur -->
                <div class="col-12 agama">
                    <div class="card shadow-sm p-4">
                        <h4 class="mb-3 text-center">Berdasarkan Agama</h4>
                        <div style="height: 400px">
                            <canvas id="AgamaChart" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!--/project Section-->

    <!--Feature Section-->
    <section class="features">
        <div class="container">
            <div class="sec-title">
                <h2>Penduduk <span>Pindah, Masuk, Meninggal, dan Lahir</span></h2>
            </div>
            <div class="row">
                <!--Start single feature icon-->
                <div class="col-lg-3 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon fa fa-sign-out"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">Pindah</a></h4>
                            <p class="fw-bold">{{ $riwayat->pindah ? $riwayat->pindah : 0 }} Jiwa</p>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-3 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon fa fa-sign-in"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">Masuk</a></h4>
                            <p class="fw-bold">{{ $riwayat->masuk ? $riwayat->masuk : 0 }} Jiwa</p>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-3 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon fa fa-bed"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">Meninggal</a></h4>
                            <p class="fw-bold">{{ $riwayat->meninggal ? $riwayat->meninggal : 0 }} Jiwa</p>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
                <!--Start single feature icon-->
                <div class="col-lg-3 col-md-6">
                    <div class="single-item">
                        <span class="top-border"></span>
                        <span class="right-border"></span>
                        <span class="bottom-border"></span>
                        <div class="features-left-bg"></div>
                        <div class="icon-box">
                            <i class="icon fa fa-user"></i>
                        </div>
                        <div class="content-box">
                            <h4><a href="#">Lahir</a></h4>
                            <p class="fw-bold">{{ $riwayat->lahir ? $riwayat->lahir : 0 }} Jiwa</p>
                        </div>
                    </div>
                </div>
                <!--End single feature icon-->
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kelompok = document.querySelector('.kelompok');
            const dusun = document.querySelector('.dusun');
            const pendidikan = document.querySelector('.pendidikan');
            const pekerjaan = document.querySelector('.pekerjaan');
            const wajihPilih = document.querySelector('.wajib-pilih');
            const perkawinan = document.querySelector('.perkawinan');
            const agama = document.querySelector('.agama');

            // Awal: hanya tampilkan kelompok
            kelompok.style.display = 'block';
            dusun.style.display = 'none';
            pendidikan.style.display = 'none';
            pekerjaan.style.display = 'none';
            wajihPilih.style.display = 'none';
            perkawinan.style.display = 'none';
            agama.style.display = 'none';

            // Klik tombol Kelompok
            document.querySelector('[data-filter=".kelompok"] span').addEventListener('click', function() {
                kelompok.style.display = 'block';
                dusun.style.display = 'none';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'none';
                agama.style.display = 'none';
            });

            // Klik tombol Dusun
            document.querySelector('[data-filter=".dusun"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'block';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'none';
                agama.style.display = 'none';
            });

            // Klik tombol Pendidikan
            document.querySelector('[data-filter=".pendidikan"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'none';
                pendidikan.style.display = 'block';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'none';
                agama.style.display = 'none';
            });

            document.querySelector('[data-filter=".pekerjaan"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'none';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'block';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'none';
                agama.style.display = 'none';
            });

            document.querySelector('[data-filter=".wajib-pilih"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'none';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'block';
                perkawinan.style.display = 'none';
                agama.style.display = 'none';
            });

            document.querySelector('[data-filter=".perkawinan"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'none';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'block';
                agama.style.display = 'none';
            });

            document.querySelector('[data-filter=".agama"] span').addEventListener('click', function() {
                kelompok.style.display = 'none';
                dusun.style.display = 'none';
                pendidikan.style.display = 'none';
                pekerjaan.style.display = 'none';
                wajihPilih.style.display = 'none';
                perkawinan.style.display = 'none';
                agama.style.display = 'block';
            });
        });
    </script>

    <script>
        fetch('/chart-umur')
            .then(res => res.json())
            .then(data => {
                const labels = data.map(item => item.range).reverse();
                const laki = data.map(item => -item['Laki-Laki']).reverse();
                const perempuan = data.map(item => item['Perempuan']).reverse();

                const ctx = document.getElementById('pyramidChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Laki-Laki',
                                data: laki,
                                backgroundColor: '#3b8b6f',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                            },
                            {
                                label: 'Perempuan',
                                data: perempuan,
                                backgroundColor: '#f6a5a5',
                                borderWidth: 2,
                                borderRadius: 5,
                                borderSkipped: false,
                            }
                        ]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        scales: {
                            x: {
                                stacked: true,
                                ticks: {
                                    callback: function(value) {
                                        return Math.abs(value);
                                    }
                                }
                            },
                            y: {
                                stacked: true
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + Math.abs(context.parsed.x);
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/chart-dusun')
            .then(res => res.json())
            .then(data => {
                const labels = data.map(item => item.dusun);
                const values = data.map(item => item.total);
                const colors = [
                    '#4B77BE', '#90C695', '#F7C55C', '#F75E5E', '#B36AE2', '#1ABC9C', '#E67E22', '#34495E'
                ]; // tambah sesuai jumlah dusun

                // Pie Chart
                const ctx = document.getElementById('dusunChart').getContext('2d');
                const chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: colors,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.parsed;
                                        const total = context.chart._metasets[0].total;
                                        const percent = ((value / total) * 100).toFixed(2);
                                        return `${label} : ${percent}%`;
                                    }
                                }
                            }
                        }
                    }
                });

                // Tambahkan legenda manual
                const legend = document.getElementById("legendList");
                data.forEach((item, index) => {
                    legend.innerHTML += `<li>${item.dusun} : ${item.total} Jiwa</li>`;
                });
            });
    </script>
    <script>
        fetch('/chart-pendidikan')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.pendidikan_terakhir);
                const totals = data.map(item => item.total);

                const ctx = document.getElementById('pendidikanChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Penduduk',
                            data: totals,
                            backgroundColor: '#4B77BE'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Pendidikan Terakhir'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Jumlah: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/chart-pekerjaan')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.pekerjaan);
                const totals = data.map(item => item.total);

                const ctx = document.getElementById('pekerjaanChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Penduduk',
                            data: totals,
                            borderColor: '#1ABC9C',
                            backgroundColor: 'rgba(26, 188, 156, 0.2)',
                            tension: 0.3,
                            fill: true,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Pekerjaan'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Jumlah: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/chart-wajib-pilih')
            .then(res => res.json())
            .then(data => {
                const labels = data.map(item => item.tahun_lahir);
                const totals = data.map(item => item.total);

                const ctx = document.getElementById('wajibPilihChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // atau 'bar'
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Wajib Pilih',
                            data: totals,
                            borderColor: '#007bff',
                            backgroundColor: 'rgba(0, 123, 255, 0.2)',
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
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tahun Lahir'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Jumlah: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/chart-status-perkawinan')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.status_perkawinan);
                const totals = data.map(item => item.total);

                const ctx = document.getElementById('PerkawinanChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Penduduk',
                            data: totals,
                            backgroundColor: '#4B77BE'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Perkawinan'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Jumlah: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
    <script>
        fetch('/chart-agama')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.agama);
                const totals = data.map(item => item.total);

                const ctx = document.getElementById('AgamaChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Penduduk',
                            data: totals,
                            backgroundColor: '#4B77BE'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Agama'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Jumlah: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
    </script>
@endpush
