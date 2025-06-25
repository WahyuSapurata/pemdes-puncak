@extends('layouts.layout')
{{-- @section('button')
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
    </div>
@endsection --}}
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Nomor</th>
                                            <th>Isi Pesan</th>
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
@section('script')
    <script>
        let control = new Control();

        // $(document).on('click', '#button-side-form', function() {
        //     window.location.href = '/admin/pengumuman-tambah';
        // })

        // $(document).on('click', '.button-update', function(e) {
        //     e.preventDefault();
        //     window.location.href = '/admin/pengumuman-edit/' + $(this).attr('data-uuid');
        // })

        // $(document).on('click', '.button-delete', function(e) {
        //     e.preventDefault();
        //     let url = '/admin/pengumuman-delete/' + $(this).attr('data-uuid');
        //     let label = $(this).attr('data-label');
        //     control.ajaxDelete(url, label)
        // })

        // $(document).on('click', '.button-action', function(e) {
        //     e.preventDefault();
        //     let label = $(this).attr('data-label');

        //     $.ajax({
        //         type: 'GET',
        //         url: '/admin/button-pengumuman/' + $(this).attr('data-uuid'),
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             $(".text-danger").html("");
        //             if (response.success == true) {
        //                 swal
        //                     .fire({
        //                         text: `Pengumuman di ` + label,
        //                         icon: "success",
        //                         showConfirmButton: false,
        //                         timer: 1500,
        //                     })
        //                     .then(function() {
        //                         initDatatable();
        //                     });
        //             } else {
        //                 swal.fire({
        //                     title: response.message,
        //                     text: response.data,
        //                     icon: "warning",
        //                     showConfirmButton: false,
        //                     timer: 1500,
        //                 });
        //             }
        //         },
        //     });
        // })

        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        })

        const initDatatable = async () => {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            // Initialize DataTable
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: '/admin/aduan-get',
                columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'nama',
                    className: 'text-center',
                }, {
                    data: 'email',
                    className: 'text-center',
                }, {
                    data: 'nomor',
                    className: 'text-center',
                }, {
                    data: 'pesan',
                }],
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
    </script>
@endsection
