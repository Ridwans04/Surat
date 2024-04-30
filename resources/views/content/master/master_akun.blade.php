@extends('layouts/contentLayoutMaster')

@section('title', 'Master Akun')

@section('vendor-style')
    <!-- Vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <h3>Akun dan Level</h3>
    <p>Tiap Level (Super Admin, Admin, PJ) dan juga dibagi menjadi per institusi</p>

    <!-- Permission Table -->
    <div class="card">
        <div class="card-header p-1">
            <div class="col-md-3" style="margin-left: 7px">
                <button class="btn btn-outline-success" onclick="get_data_akun()">Refresh</button>
            </div>
            <div class="me-1">
                <div class="input-group input-group-merge">
                    <span class="input-group-text cursor-pointer" style="border: 2px solid #7e7e81;"><i
                            data-feather="search"></i></span>
                    <input type="text" id="cari_data_penting" class="form-control"
                        style="padding-left: 4px;" oninput="cari_data()"
                        placeholder="Cari Data....." name="nomor_surat" />
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table id="master_akun" class="table">
            </table>
        </div>
    </div>
    <!--/ Permission Table -->

    @include('content/_partials/_modals/modal-add-permission')
    @include('content/_partials/_modals/modal-edit-permission')
@endsection

@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/modal-add-permission.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/modal-edit-permission.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-access-permission.js')) }}"></script>
    <script>
        function get_data_akun() {
            $.ajax({
                type: "GET",
                url: `{{ route('get_data_akun') }}`,
                beforeSend: function() {
                    $('#master_akun').block({
                        message: '<div class="loader-box"><div class="loader-1"></div></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                },
                dataType: "JSON",
                success: function(response) {
                    var html_row = "";
                    var menu = "";
                    var date = new Date();
                    $.each(response.data, function(key, val) {
                        menu =
                            `<div class="btn-group">
                                <button class="btn btn-success dropdown-toggle" type="button"
                                    id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i data-feather="list"></i>
                                </button>
                                <div class="dropdown-menu p-1" aria-labelledby="dropdownMenuButton2">
                                    <button
                                        onclick="modal_detail('${val.id}', '${val.kode_arsip}', '${val.tanggal_arsip}', '${val.masa_penyimpanan}')"
                                        type="button" class="btn btn-icon btn-success w-100 mb-1 text-start">
                                        <i data-feather="edit"></i>
                                        Edit</button>
                                    <a href="arsip/lihat_arsip/${val.id}" target="_blank"
                                        class="btn btn-icon btn-info w-100 mb-1 text-start"><i
                                            data-feather="file-plus"></i>
                                        Lihat</a>
                                </div>
                            </div>`
                        html_row += `<tr>
                            <td>${val.username}</td>
                            <td style="white-space:nowrap">${val.level}</td>
                            <td>${val.institusi}</td>
                            <td>${menu}</td>
                        </tr>`;
                    });
                    var html_content = `
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Institusi</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    ${html_row}
                </tbody>`;
                    if ($.fn.DataTable.isDataTable('#master_akun')) {
                        $('#master_akun').DataTable().destroy();
                    }
                    $('#master_akun').unblock().html(html_content).DataTable({
                        searching: false,
                        ordering: false,
                        drawCallback: function() {
                            $('#master_akun [data-feather]').each(function() {
                                var icon = $(this).data('feather');
                                $(this).empty().append(feather.icons[icon].toSvg({
                                    width: 14,
                                    height: 14
                                }));
                            });
                        }
                    });
                },
                error: function(error) {
                    Swal.fire(
                        'Error',
                        'Kesalahan Data',
                        'error'
                    )
                }
            });
        }
    </script>
@endsection
