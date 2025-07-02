<!-- Header Top start -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <!--Top Left-->
            <div class="col-lg-3 col-md-12 top-left d-flex align-items-center header-text">
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
                    <div class="logo"><a class="d-flex align-items-center" href="#">
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
                        <div class="logo"><a href="#"><img src="{{ asset('logo-sinjai.png') }}" alt=""
                                    title="">
                                <div
                                    style="color: #161414; font-size: 25px; line-height: 25px; font-weight: bold; font-style: italic;">
                                    Pemdes <br> Puncak</div>
                            </a></div>
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
                    <a href="#" class="btn-style-one" data-toggle="modal" data-target="#exampleModal">Ajukan
                        Permohonan</a>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>
<!--/End MAIN MENU -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Surat Permohonan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-data" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="number" id="nik" class="form-control" name="nik">
                        <small class="text-danger nik_error"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon/WA</label>
                        <input type="number" id="nomor" class="form-control" name="nomor">
                        <small class="text-danger nomor_error"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Surat</label>
                        <select name="jenis_surat" class="form-control" id="jenis_surat"
                            data-placeholder="Silahkan pilih jenis surat">
                            <option value="">-- Silahkan pilih jenis surat --</option>
                            <option value="Surat Pengantar Permohonan Penerbitan Kartu Tanda Penduduk / Domisili">Surat
                                Pengantar Permohonan Penerbitan Kartu Tanda Penduduk / Domisili</option>
                            <option value="Surat Pengantar Permohonan Penerbitan Kartu Keluarga (KK)">Surat Pengantar
                                Permohonan Penerbitan Kartu Keluarga (KK)</option>
                            <option value="Surat Pengantar Permohonan Penerbitan Akta Kelahiran (AK)">Surat Pengantar
                                Permohonan Penerbitan Akta Kelahiran (AK)</option>
                            <option value="Surat Pengantar Permohonan Penerbitan Surat Keterangan Pindah">Surat
                                Pengantar Permohonan Penerbitan Surat Keterangan Pindah</option>
                            <option value="Surat Keterangan Kematian dan Penguburan">Surat Keterangan Kematian dan
                                Penguburan</option>
                            <option value="Surat Keterangan Tidak Mampu / Kurang Mampu">Surat Keterangan Tidak Mampu /
                                Kurang Mampu</option>
                            <option value="Surat Keterangan Kepemilikan Tanah">Surat Keterangan Kepemilikan Tanah
                            </option>
                            <option value="Surat Keterangan Ahli Waris">Surat Keterangan Ahli Waris</option>
                            <option value="Surat Permohonan Proposal / Bantuan">Surat Permohonan Proposal / Bantuan
                            </option>
                            <option value="Surat Keterangan Ternak (Domisili / Mutasi / Kartunisasi)">Surat Keterangan
                                Ternak (Domisili / Mutasi / Kartunisasi)</option>
                            <option value="Surat Keterangan Hibah">Surat Keterangan Hibah</option>
                            <option value="Surat Pengantar Dispensasi Nikah / Wali Nikah / Imunisasi / Catin">Surat
                                Pengantar Dispensasi Nikah / Wali Nikah / Imunisasi / Catin</option>
                            <option value="Surat Keterangan Mahar">Surat Keterangan Mahar</option>
                            <option value="Surat Keterangan Belum Menikah / Sudah Menikah / Cerai (Janda / Duda)">Surat
                                Keterangan Belum Menikah / Sudah Menikah / Cerai (Janda / Duda)</option>
                            <option value="Surat Keterangan Penghasilan Orang Tua">Surat Keterangan Penghasilan Orang
                                Tua</option>
                            <option value="Surat Keterangan Ijin Potong Ternak">Surat Keterangan Ijin Potong Ternak
                            </option>
                            <option value="Surat Keterangan Usaha / NIB">Surat Keterangan Usaha / NIB</option>
                            <option value="Surat Keterangan Jual Beli Tanah">Surat Keterangan Jual Beli Tanah</option>
                            <option value="Surat Keterangan Lain Lain">Surat Keterangan Lain Lain</option>
                        </select>
                        <small class="text-danger jenis_surat_error"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="30" rows="5"></textarea>
                        <small class="text-danger keterangan_error"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File KTP</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-file"
                                        aria-hidden="true"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_ktp"
                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Upload Gambar Ktp</label>
                            </div>
                        </div>
                        <small class="text-danger file_ktp_error"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-style-one bg-danger" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn-style-one">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: '/add-pengajuan',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response); // Lihat outputnya di console

                    $(".text-danger").html("");

                    if (response.success === true) {
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function() {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal Terkirim",
                            text: response.message,
                            icon: "warning",
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    $(".text-danger").html("");
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $(`.${key}_error`).html(value);
                        });
                    } else {
                        Swal.fire({
                            title: "Terjadi Kesalahan",
                            text: xhr.responseJSON.message,
                            icon: "error"
                        });
                    }
                },
            });
        });
    });
</script>
