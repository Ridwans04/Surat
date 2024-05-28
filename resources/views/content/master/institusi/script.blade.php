@section('title', 'Master Data')

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


@section('vendor-script')
    <!-- Vendor js files -->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/modal-add-role.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-access-roles.js')) }}"></script>
    <script>
        const tableSuccess = (data, table) => {
            var html_row = "";
            var menu = "";
            $.each(data, function(key, val) {

                menu =
                    `
                    <button onclick="show_modal('${val.id}')"
                    type="button" class="btn btn-icon btn-info text-start">
                    <i data-feather="edit"></i>
                     Edit</button>
                `
                html_row += `<tr>
                            <td>${val.nama_institusi}</td>
                            <td>${val.initial_institusi}</td>
                            <td>${menu}</td>
                        </tr>`;
            });
            var html_content = `
            <thead>
                <tr>
                    <th>Nama Institusi</th>
                    <th>Inisial Institusi</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                ${html_row}
            </tbody>`;
            if ($.fn.DataTable.isDataTable(table)) {
                $(table).DataTable().destroy();
            }
            $(table).unblock().html(html_content).DataTable({
                ordering: false,
                drawCallback: function() {
                    $(`${table} [data-feather]`).each(function() {
                        var icon = $(this).data('feather');
                        $(this).empty().append(feather.icons[icon].toSvg({
                            width: 14,
                            height: 14
                        }));
                    });
                }
            });
        }
        const tableError = (data, table) => {
            var html_content = `
                            <thead>
                                <tr>
                                    <th>Nama Institusi</th>
                                    <th>Inisial Institusi</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>`;
            $(table).html(html_content);
            $(table).unblock();
            setTable(table);
        }
        const get_data = () => {
            success_msg = "Data berhasil ditampilkan";
            warning_msg = "Data gagal ditampilkan";
            error_msg = "Data gagal ditampilkan";
            var url = `{{ route('institusi.index') }}`;
            var method = "GET";
            var data = {};
            var table = "table";
            var funcSuccess = tableSuccess;
            var funcError = tableError;
            ajaxtable(url, data, method, table, funcSuccess, funcError);
        }
        get_data();

        const show_modal = () => {
            success_msg = "Data berhasil ditampilkan";
            warning_msg = "Data gagal ditampilkan";
            error_msg = "Data gagal ditampilkan";
            var url = 
        }
    </script>
@endsection
