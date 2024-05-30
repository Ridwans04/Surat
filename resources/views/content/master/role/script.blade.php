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
    <script src="{{ asset('js/scripts/tool/block-ui.js') }}"></script>
    <script src="{{ asset('js/scripts/tool/sweet-alert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // FUNGSI MENAMPILKAN TABLE
        const tableSuccess = (data, table) => {
            var html_row = "";
            var menu = "";
            var no = 1;
            $.each(data, function(key, val) {

                menu =
                    `
                    <button onclick="show_modal('${val.id}')"
                    type="button" class="btn btn-icon btn-info text-start">
                    <i data-feather="edit"></i>
                     Edit</button>
                `
                html_row += `<tr>
                            <td>${no++}</td>
                            <td>${val.role}</td>
                            <td>${val.initial_role}</td>
                            <td>${menu}</td>
                        </tr>`;
            });
            var html_content = `
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Role</th>
                    <th>Inisial Role</th>
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
                                    <th>No.</th>
                                    <th>Nama Role</th>
                                    <th>Inisial Role</th>
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
            var url = `{{ route('role.index') }}`;
            var method = "GET";
            var data = {};
            var table = "table";
            var funcSuccess = tableSuccess;
            var funcError = tableError;
            ajaxtable(url, data, method, table, funcSuccess, funcError);
        }
        get_data();
        // END FUNGSI MENAMPILKAN TABLE

        // FUNGSI MEMBUAT DATA
        const create_data = (obj) => {
            const form = new FormData(obj);
            success_msg = "Data berhasil dibuat";
            warning_msg = "Data gagal dibuat";
            error_msg = "Data gagal dibuat";
            var url = `{{ route('institusi.store') }}`;
            var method = "POST";
            var funcSuccess = get_data;
            var funcError = function () {};
            ajaxtable(url, form, method, "", funcSuccess, funcError);
        } 
        // END FUNGSI MEMBUAT DATA

        // FUNGSI MENAMPILKAN MODAL UPDATE DATA
        const show_modal = (id) => {
            success_msg = "Data berhasil ditampilkan";
            warning_msg = "Data gagal ditampilkan";
            error_msg = "Data gagal ditampilkan";
            var url = `{{ route('institusi.show', ':id') }}`;
            url = url.replace(":id", id);
            var method = "GET";
            var data = {};
            var table = "table";
            var funcSuccess = setDataUpdate;
            var funcError = function() {};
            ajaxtable(url, {}, "GET", "", funcSuccess, funcError);
        }

        const setDataUpdate = (data, table) => {
            $(table).unblock();
            $('input[name="id_ins"]').val(data.id);
            $('#nm_ins').val(data.nama_institusi.replaceAll('_', ' '));
            $('#int_ins').val(data.initial_institusi);
            $('#modal_update').modal('show');
        }
        // END FUNGSI MENAMPILKAN MODAL UPDATE DATA

        // FUNGSI UPDATE DATA
        const update_data = (obj) => {
            const form = new FormData(obj);
            success_msg = "Data berhasil diperbarui";
            warning_msg = "Data gagal diperbarui";
            error_msg = "Data gagal diperbarui";
            var url = `{{ route('institusi.update', ':id') }}`;
            url = url.replace(':id', form.get('id_ins'));
            data = form;
            var method = "POST";
            var funcSuccess = get_data;
            var funcError = function() {};
            ajaxtable(url, data, method, "", funcSuccess, funcError)
        }
        // END FUNGSI UPDATE DATA
    </script>
@endsection
