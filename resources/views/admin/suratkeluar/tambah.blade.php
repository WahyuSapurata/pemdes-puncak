@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-info btn-sm" id="button-side-form">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" id="svg-button"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <style>
                        #svg-button {
                            fill: #ffffff
                        }
                    </style>
                    <path
                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z" />
                </svg>
                Kembali</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <!--begin::Card body-->
                        <div class="card-body hover-scroll-overlay-y">
                            <form class="form-data" enctype="multipart/form-data">

                                <input type="hidden" name="id">
                                <input type="hidden" name="uuid">

                                <div class="mb-10">
                                    <label class="form-label">Nomor Surat</label>
                                    <input type="text" id="nomor_surat" class="form-control" name="nomor_surat">
                                    <small class="text-danger nomor_surat_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Tanggal Surat</label>
                                    <input type="text" id="tanggal_surat" class="form-control kt_datepicker_7"
                                        name="tanggal_surat">
                                    <small class="text-danger tanggal_surat_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Tujuan</label>
                                    <input type="text" id="tujuan" class="form-control" name="tujuan">
                                    <small class="text-danger tujuan_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Perihal</label>
                                    <input type="text" id="perihal" class="form-control" name="perihal">
                                    <small class="text-danger perihal_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Isi Ringkas Surat</label>
                                    <textarea id="isi_ringkas" name="isi_ringkas"></textarea>
                                    <small class="text-danger isi_ringkas_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label for="file_surat" class="form-label">Upload Surat (PDF)</label>
                                    <input type="file" class="form-control" name="file_surat" id="file_surat"
                                        accept=".pdf" />
                                    <div>
                                        <small class="text-danger file_surat_error"></small>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="d-flex gap-5">
                                    <button type="submit"
                                        class="btn btn-success btn-sm btn-submit d-flex align-items-center"><i
                                            class="bi bi-file-earmark-diff"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            window.history.back();
        })

        var options = {
            selector: "#isi_ringkas",
            height: "480"
        };
        tinymce.init(options);

        $(".kt_datepicker_7").flatpickr({
            altInput: true,
            altFormat: "d-m-Y",
            dateFormat: "d-m-Y",
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: '/admin/surat/surat-keluar-store',
                data: new FormData($(".form-data")[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal
                            .fire({
                                text: `Surat keluar berhasil di Tambah`,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            .then(function() {
                                window.location.href = '/admin/surat/surat-keluar';
                            });
                    } else {
                        $("form")[0].reset();
                        $("#from_select").val(null).trigger("change");
                        // $(".form-select").val(null).trigger("change");
                        swal.fire({
                            title: response.message,
                            text: response.data,
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function(xhr) {
                    $(".text-danger").html("");
                    $.each(xhr.responseJSON["errors"], function(key, value) {
                        $(`.${key}_error`).html(value);
                    });
                },
            });
        });


        $(function() {});
    </script>
@endsection
