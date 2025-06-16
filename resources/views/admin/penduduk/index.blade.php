@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-primary btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
                id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah
                Data</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" id="export-excel" class="btn btn-sm btn-success d-flex align-items-center gap-1">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.14933 1.3335H4.44445C3.97295 1.3335 3.52076 1.50909 3.18737 1.82165C2.85397 2.13421 2.66667 2.55814 2.66667 3.00016V13.0002C2.66667 13.4422 2.85397 13.8661 3.18737 14.1787C3.52076 14.4912 3.97295 14.6668 4.44445 14.6668H11.5556C12.0271 14.6668 12.4792 14.4912 12.8126 14.1787C13.146 13.8661 13.3333 13.4422 13.3333 13.0002V5.256C13.3333 5.035 13.2396 4.82307 13.0729 4.66683L9.77778 1.57766C9.61112 1.42137 9.38506 1.33354 9.14933 1.3335ZM9.33333 4.25016V2.5835L12 5.0835H10.2222C9.98648 5.0835 9.76038 4.9957 9.59368 4.83942C9.42698 4.68314 9.33333 4.47118 9.33333 4.25016ZM6.11911 6.90016L8 9.016L9.88089 6.89933C9.95645 6.81446 10.0649 6.76121 10.1823 6.75128C10.2998 6.74136 10.4166 6.77558 10.5071 6.84641C10.5976 6.91725 10.6544 7.0189 10.665 7.129C10.6756 7.23909 10.6391 7.34863 10.5636 7.4335L8.57867 9.66683L10.5636 11.9002C10.6357 11.9854 10.6694 12.0936 10.6575 12.2018C10.6456 12.3101 10.5891 12.4096 10.4999 12.4792C10.4108 12.5489 10.2961 12.5831 10.1805 12.5745C10.0648 12.566 9.95729 12.5154 9.88089 12.4335L8 10.3177L6.11911 12.4343C6.04355 12.5192 5.93513 12.5725 5.81769 12.5824C5.70025 12.5923 5.58342 12.5581 5.49289 12.4872C5.40236 12.4164 5.34556 12.3148 5.33497 12.2047C5.32439 12.0946 5.36089 11.985 5.43645 11.9002L7.42133 9.66683L5.43645 7.4335C5.39742 7.39168 5.36772 7.34297 5.34907 7.29023C5.33043 7.2375 5.32322 7.18179 5.32788 7.12641C5.33254 7.07102 5.34896 7.01706 5.37619 6.96772C5.40342 6.91837 5.4409 6.87462 5.48642 6.83906C5.53195 6.80349 5.58461 6.77681 5.64129 6.76061C5.69798 6.7444 5.75755 6.73898 5.8165 6.74467C5.87545 6.75037 5.93259 6.76706 5.98456 6.79376C6.03653 6.82046 6.08228 6.85664 6.11911 6.90016Z"
                        fill="white" />
                    <mask id="mask0_198_8745" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="1"
                        width="12" height="14">
                        <path
                            d="M9.14933 1.3335H4.44445C3.97295 1.3335 3.52076 1.50909 3.18737 1.82165C2.85397 2.13421 2.66667 2.55814 2.66667 3.00016V13.0002C2.66667 13.4422 2.85397 13.8661 3.18737 14.1787C3.52076 14.4912 3.97295 14.6668 4.44445 14.6668H11.5556C12.0271 14.6668 12.4792 14.4912 12.8126 14.1787C13.146 13.8661 13.3333 13.4422 13.3333 13.0002V5.256C13.3333 5.035 13.2396 4.82307 13.0729 4.66683L9.77778 1.57766C9.61112 1.42137 9.38506 1.33354 9.14933 1.3335ZM9.33333 4.25016V2.5835L12 5.0835H10.2222C9.98648 5.0835 9.76038 4.9957 9.59368 4.83942C9.42698 4.68314 9.33333 4.47118 9.33333 4.25016ZM6.11911 6.90016L8 9.016L9.88089 6.89933C9.95645 6.81446 10.0649 6.76121 10.1823 6.75128C10.2998 6.74136 10.4166 6.77558 10.5071 6.84641C10.5976 6.91725 10.6544 7.0189 10.665 7.129C10.6756 7.23909 10.6391 7.34863 10.5636 7.4335L8.57867 9.66683L10.5636 11.9002C10.6357 11.9854 10.6694 12.0936 10.6575 12.2018C10.6456 12.3101 10.5891 12.4096 10.4999 12.4792C10.4108 12.5489 10.2961 12.5831 10.1805 12.5745C10.0648 12.566 9.95729 12.5154 9.88089 12.4335L8 10.3177L6.11911 12.4343C6.04355 12.5192 5.93513 12.5725 5.81769 12.5824C5.70025 12.5923 5.58342 12.5581 5.49289 12.4872C5.40236 12.4164 5.34556 12.3148 5.33497 12.2047C5.32439 12.0946 5.36089 11.985 5.43645 11.9002L7.42133 9.66683L5.43645 7.4335C5.39742 7.39168 5.36772 7.34297 5.34907 7.29023C5.33043 7.2375 5.32322 7.18179 5.32788 7.12641C5.33254 7.07102 5.34896 7.01706 5.37619 6.96772C5.40342 6.91837 5.4409 6.87462 5.48642 6.83906C5.53195 6.80349 5.58461 6.77681 5.64129 6.76061C5.69798 6.7444 5.75755 6.73898 5.8165 6.74467C5.87545 6.75037 5.93259 6.76706 5.98456 6.79376C6.03653 6.82046 6.08228 6.85664 6.11911 6.90016Z"
                            fill="white" />
                    </mask>
                    <g mask="url(#mask0_198_8745)">
                        <rect width="16" height="16" fill="white" />
                    </g>
                </svg>
                Export Excel
            </button>
        </div>
        <!--end::Actions-->
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5 table-responsive">
                                <table id="kt_table_data"
                                    class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300">
                                    <thead class="text-center">
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Agama</th>
                                            <th>Status Perkawinan</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>Dusun</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kewarganegaraan</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Golongan Darah</th>
                                            <th>Status Dalam Keluarga</th>
                                            <th>Ayah</th>
                                            <th>Ibu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('side-form')
    <div id="side_form" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
        data-kt-drawer-toggle="#side_form_button" data-kt-drawer-close="#side_form_close" data-kt-drawer-width="500px">
        <!--begin::Card-->
        <div class="card w-100">
            <!--begin::Card header-->
            <div class="card-header pe-5">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#"
                            class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1 title_side_form"></a>
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="side_form_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body hover-scroll-overlay-y">
                <form class="form-data" enctype="multipart/form-data">

                    <input type="hidden" name="id">
                    <input type="hidden" name="uuid">

                    <div class="mb-10">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control">
                        <small class="text-danger nik_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">KK</label>
                        <input type="text" name="kk" class="form-control">
                        <small class="text-danger kk_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                        <small class="text-danger nama_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <small class="text-danger jenis_kelamin_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                        <small class="text-danger tempat_lahir_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" class="form-control kt_datepicker_7">
                        <small class="text-danger tanggal_lahir_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Agama</label>
                        <select name="agama" class="form-select" data-placeholder="Pilih agama">
                            <option value="">-- Pilih Agama --</option>
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                            <option value="kristen katolik">Kristen Katolik</option>
                            <option value="kristen protestan">Kristen Protestan</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                        <small class="text-danger agama_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                        <small class="text-danger status_perkawinan_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Pekerjaan</label>
                        <select name="pekerjaan" class="form-select" data-placeholder="Pekerjaan">
                            <option value="">-- Pilih Pekerjaan --</option>
                            <option value="petani">Petani</option>
                            <option value="pelajar/mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="pns">Pns</option>
                            <option value="buruh">Buruh</option>
                            <option value="karyawan swasta">Karyawan Swasta</option>
                            <option value="guru">Guru</option>
                            <option value="bidan">Bidan</option>
                            <option value="perawat">Perawat</option>
                            <option value="irt">IRT</option>
                            <option value="buruh harian lepas">Buruh Harian Lepas</option>
                            <option value="belum/tidak bekerja">Belum/Tidak Bekerja</option>
                            <option value="wiraswasta">Wiraswasta</option>
                        </select>
                        <small class="text-danger pekerjaan_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"></textarea>
                        <small class="text-danger alamat_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Dusun</label>
                        <input type="text" name="dusun" class="form-control">
                        <small class="text-danger dusun_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">RT</label>
                        <input type="text" name="rt" class="form-control">
                        <small class="text-danger rt_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">RW</label>
                        <input type="text" name="rw" class="form-control">
                        <small class="text-danger rw_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-select" data-placeholder="Kewarganegaraan">
                            <option value="">-- Pilih Kewarganegaraan --</option>
                            <option value="wni">WNI</option>
                            <option value="wna">WNA</option>
                        </select>
                        <small class="text-danger kewarganegaraan_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" class="form-select" data-placeholder="Pilih pendidikan">
                            <option value="">-- Pilih Pendidikan Terakhir --</option>
                            <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                            <option value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                            <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                            <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                            <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                            <option value="D1">Diploma I (D1)</option>
                            <option value="D2">Diploma II (D2)</option>
                            <option value="D3">Diploma III (D3)</option>
                            <option value="D4">Diploma IV (D4)</option>
                            <option value="S1">Sarjana (S1)</option>
                            <option value="S2">Magister (S2)</option>
                            <option value="S3">Doktor (S3)</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <small class="text-danger pendidikan_terakhir_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Golongan Darah</label>
                        <select name="golongan_darah" class="form-control">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="-">-</option>
                        </select>
                        <small class="text-danger golongan_darah_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Status Dalam Keluarga</label>
                        <select name="status_dalam_keluarga" class="form-select" data-placeholder="Pilih status">
                            <option value="">-- Pilih Status Dalam Keluarga --</option>
                            <option value="kepala Keluarga">Kepala Keluarga</option>
                            <option value="istri">Istri</option>
                            <option value="anak">Anak</option>
                            <option value="mertua">Mertua</option>
                            <option value="orang tua">Orang Tua</option>
                        </select>
                        <small class="text-danger status_dalam_keluarga_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" name="ayah" class="form-control">
                        <small class="text-danger ayah_error"></small>
                    </div>

                    <div class="mb-10">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" name="ibu" class="form-control">
                        <small class="text-danger ibu_error"></small>
                    </div>

                    <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="d-flex gap-5">
                        <button type="submit" class="btn btn-primary btn-sm btn-submit d-flex align-items-center"><i
                                class="bi bi-file-earmark-diff"></i> Simpan</button>
                        <button type="reset" id="side_form_close"
                            class="btn mr-2 btn-light btn-cancel btn-sm d-flex align-items-center"
                            style="background-color: #ea443e65; color: #EA443E"><i class="bi bi-trash-fill"
                                style="color: #EA443E"></i>Batal</button>
                    </div>
                </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(".kt_datepicker_7").flatpickr({
            dateFormat: "d-m-Y",
        });

        $(document).on('click', '#button-side-form', function() {
            control.overlay_form('Tambah', 'Penduduk');
        })

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            let type = $(this).attr('data-type');
            if (type == 'add') {
                control.submitFormMultipartData('/admin/infografis/penduduk-add', 'Tambah',
                    'Penduduk',
                    'POST');
            } else {
                let uuid = $("input[name='uuid']").val();
                control.submitFormMultipartData('/admin/infografis/penduduk-update/' + uuid,
                    'Update',
                    'Penduduk', 'POST');
            }
        });

        $(document).on('click', '.button-update', function(e) {
            e.preventDefault();
            let url = '/admin/infografis/penduduk-show/' + $(this).attr('data-uuid');
            control.overlay_form('Update', 'Penduduk', url);
        })

        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            let url = '/admin/infografis/penduduk-delete/' + $(this).attr('data-uuid');
            let label = $(this).attr('data-label');
            control.ajaxDelete(url, label)
        })

        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        })

        const initDatatable = async () => {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            var groupedData = {}; // Menyimpan nilai grup sebelumnya

            // Initialize DataTable
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: '/admin/infografis/penduduk-get',
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nik',
                        className: 'text-center',
                    }, {
                        data: 'nama',
                        className: 'text-center',
                    }, {
                        data: 'jenis_kelamin',
                        className: 'text-center',
                    }, {
                        data: 'tempat_lahir',
                        className: 'text-center',
                    }, {
                        data: 'tanggal_lahir',
                        className: 'text-center',
                    }, {
                        data: 'agama',
                        className: 'text-center',
                    }, {
                        data: 'status_perkawinan',
                        className: 'text-center',
                    }, {
                        data: 'pekerjaan',
                        className: 'text-center',
                    }, {
                        data: 'alamat',
                        className: 'text-center',
                    }, {
                        data: 'dusun',
                        className: 'text-center',
                    }, {
                        data: 'rt',
                        className: 'text-center',
                    }, {
                        data: 'rw',
                        className: 'text-center',
                    }, {
                        data: 'kewarganegaraan',
                        className: 'text-center',
                    }, {
                        data: 'pendidikan_terakhir',
                        className: 'text-center',
                    }, {
                        data: 'golongan_darah',
                        className: 'text-center',
                    }, {
                        data: 'status_dalam_keluarga',
                        className: 'text-center',
                    }, {
                        data: 'ayah',
                        className: 'text-center',
                    }, {
                        data: 'ibu',
                        className: 'text-center',
                    },
                    {
                        data: 'uuid',
                    }
                ],
                columnDefs: [{
                    targets: -1,
                    title: 'Aksi',
                    width: '8rem',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return `
                            <a href="javascript:;" type="button" data-uuid="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-primary button-update btn-icon btn-sm">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                <mask id="mask0_1953_23043" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="18">
                                <path d="M3.5 16.2738C3.5 17.8891 4.80945 19.1986 6.42474 19.1986H10.8479L11.1681 17.9178C11.3139 17.3347 11.6155 16.8022 12.0405 16.3771L17.3522 11.0655C17.9947 10.423 18.8591 10.138 19.6986 10.2103V5.92474C19.6986 4.30945 18.3891 3 16.7738 3H10.6994V7.27463C10.6994 8.88992 9.38992 10.1994 7.77463 10.1994H3.5V16.2738ZM9.34949 3.39597L3.89597 8.84949H7.77463C8.6444 8.84949 9.34949 8.1444 9.34949 7.27463V3.39597ZM17.9886 11.7018L12.6769 17.0135C12.3672 17.3231 12.1475 17.7112 12.0412 18.1361L11.6293 19.7836C11.4503 20.5 12.0993 21.1491 12.8157 20.9699L14.4632 20.558C14.8881 20.4518 15.2761 20.2321 15.5859 19.9224L20.8975 14.6107C21.7008 13.8074 21.7008 12.5051 20.8975 11.7018C20.0943 10.8984 18.7919 10.8984 17.9886 11.7018Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23043)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>

                            <a href="javascript:;" type="button" data-uuid="${data}" data-label="Penduduk" class="btn btn-danger button-delete btn-icon btn-sm">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                <mask id="mask0_1953_23051" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="3" width="19" height="17">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.78571 3H20.2143C20.9244 3 21.5 3.58547 21.5 4.30769V4.96154C21.5 5.68376 20.9244 6.26923 20.2143 6.26923H4.78571C4.07563 6.26923 3.5 5.68376 3.5 4.96154V4.30769C3.5 3.58547 4.07563 3 4.78571 3ZM5.07475 7.60448C5.11609 7.58598 5.16081 7.57654 5.20598 7.57679H19.792C19.8372 7.57654 19.8819 7.58598 19.9232 7.60448C19.9646 7.62299 20.0016 7.65016 20.0319 7.6842C20.0623 7.71825 20.0852 7.75842 20.0992 7.80208C20.1133 7.84575 20.1181 7.89193 20.1134 7.93763L19.0579 18.259V18.2676C19.0027 18.7448 18.7772 19.1848 18.4241 19.5041C18.0711 19.8235 17.6151 19.9999 17.1426 19.9999H7.85776C7.38517 20.0001 6.92897 19.8237 6.57575 19.5044C6.22252 19.1851 5.99688 18.745 5.94165 18.2676C5.94143 18.2646 5.94143 18.2616 5.94165 18.2586L4.88455 7.93763C4.87986 7.89193 4.8847 7.84575 4.89874 7.80208C4.91278 7.75842 4.93571 7.71825 4.96604 7.6842C4.99637 7.65016 5.03341 7.62299 5.07475 7.60448ZM15.3481 15.173C15.3146 15.0933 15.2659 15.0211 15.2048 14.9608L13.4092 13.1345L15.2048 11.3082C15.3224 11.185 15.3877 11.0196 15.3864 10.8479C15.3851 10.6761 15.3175 10.5118 15.198 10.3903C15.0786 10.2689 14.917 10.2002 14.7481 10.1989C14.5792 10.1977 14.4167 10.2641 14.2956 10.3838L12.5004 12.2097L10.7048 10.3838C10.5837 10.2641 10.4211 10.1977 10.2523 10.1989C10.0834 10.2002 9.9218 10.2689 9.80237 10.3903C9.68293 10.5118 9.61527 10.6761 9.614 10.8479C9.61273 11.0196 9.67795 11.185 9.79557 11.3082L11.5912 13.1345L9.79557 14.9608C9.67795 15.084 9.61273 15.2494 9.614 15.4211C9.61527 15.5929 9.68293 15.7572 9.80237 15.8786C9.9218 16 10.0834 16.0688 10.2523 16.07C10.4211 16.0712 10.5837 16.0048 10.7048 15.8851L12.5004 14.0593L14.2956 15.8851C14.3549 15.9473 14.4258 15.9969 14.5042 16.0309C14.5826 16.065 14.6668 16.0829 14.752 16.0835C14.8372 16.0842 14.9217 16.0676 15.0005 16.0347C15.0794 16.0019 15.151 15.9534 15.2113 15.8921C15.2716 15.8309 15.3193 15.758 15.3516 15.6778C15.3839 15.5977 15.4003 15.5117 15.3997 15.4251C15.3991 15.3384 15.3815 15.2527 15.3481 15.173Z" fill="white"/>
                                </mask>
                                <g mask="url(#mask0_1953_23051)">
                                <rect x="0.5" width="24" height="24" fill="white"/>
                                </g>
                                </svg>
                            </a>
                        `;
                    },
                }],

                rowGroup: {
                    dataSrc: 'kk', // Ganti 'jenis_fasilitas_kesehatan' dengan nama kolom yang ingin digunakan sebagai grup
                    startRender: function(rows, group) {
                        if (!groupedData[group]) {
                            console.log(group);
                            groupedData[group] = 1;
                            return $("<tr/>")
                                .append(
                                    '<td colspan="10" style="background-color: #FFFFFF;">' +
                                    '<span style="font-weight: bold; color: #5caceb; padding: 2px 12px; font-size: 12px; border-radius: 8px; text-transform: uppercase;"> no Kartu keluarga = ' +
                                    group +
                                    '</span>' +
                                    '</td>'
                                ); // Modify the colspan value based on the number of columns in your table
                        } else {
                            groupedData[group]++;
                            return $("<tr/>")
                                .append(
                                    '<td colspan="10" style="background-color: #FFFFFF;">' +
                                    '<span style="font-weight: bold; color: #5caceb; padding: 2px 12px; font-size: 12px; border-radius: 8px; text-transform: uppercase;"> no Kartu keluarga = ' +
                                    group +
                                    '</span>' +
                                    '</td>'
                                ); // Modify the colspan value based on the number of columns in your table
                        }
                    },
                },
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.context[0]._iDisplayStart;
                    var rowIndex = startIndex + index + 1;
                    $('td', row).eq(0).html(rowIndex);
                },
            });
        };

        $(function() {
            initDatatable();
        });

        // $('#export-excel').click(function(e) {
        //     e.preventDefault();
        //     window.open(`/admin/infografis/penduduk-export`, "_blank");
        // });
    </script>
@endsection
