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
    <script src="{{ asset('js/scripts/tool/block-ui.js') }}"></script>
    <script src="{{ asset('js/scripts/tool/sweet-alert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const tableSuccess = (data, table) => {
            var html_row = "";
            var menu = "";
            $.each(data, function(key, val) {
                
                menu =
                    `
                        <button onclick="modal_detail('${val.id}', '${val.username}', '${val.role}')"
                        type="button" class="btn btn-icon btn-success mb-1 text-start">
                        <i data-feather="edit"></i>
                        Edit</button>
                        <button onclick="hapus_data('${val.id}', 'user_role')"
                        type="button" class="btn btn-icon btn-danger mb-1 text-start">
                        <i data-feather="trash"></i>
                        Hapus</button>
                    `
                // var role = [];
                // var listrole = val.role.replaceAll("_", " ").split(",");
                // listrole.forEach(element => {
                //     role.push(`<span class="badge badge-primary">${element}</span>`);
                // });
                html_row += `<tr>
                            <td>${val.username}</td>
                            <td>${val.role}</td>
                            <td>${menu}</td>
                        </tr>`;
            });
            var html_content = `
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Role</th>
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
                searching: false,
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
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>`;
            $(table).html(html_content);
            $(table).unblock();
            setTable(table);
        }
        const get_user_role = () => {
            success_msg = "Data berhasil ditampilkan";
            warning_msg = "Data gagal ditampilkan";
            error_msg = "Data gagal ditampilkan";
            var url = `{{ route('get_user_role') }}`;
            var method = "GET";
            var data = {};
            var table = "table";
            var funcSuccess = tableSuccess;
            var funcError = tableError;
            ajaxtable(url, data, method, table, funcSuccess, funcError);
        }
        get_user_role();

        // FUNGSI TAMBAH AKUN
        function add_role() {
            const form = new FormData(document.querySelector('form#add_akun'));
            const title = 'Anda yakin ingin menambahkan data?';
            SweetAlert(title).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "post",
                        url: "{{ route('add_akun') }}",
                        data: form,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            Swal.fire({
                                html: '<div class="loader-box"><div class="loader-2"></div></div>',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                background: 'transparent',
                            });
                        },
                        datatype: "json",
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Data berhasil ditambahkan"
                                });
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: "Data gagal ditambahkan"
                                });
                            }
                        },
                        error: function(error) {
                            Swal.fire(
                                'Error',
                                '',
                                'error'
                            )
                        }
                    });
                }
            })
        }

        // FUNGSI MENAMPILKAN MODAL DETAIL
        function modal_detail(id, user, lvl, ins) {
            $('#id_akun').val(id);
            $('#user').val(user);
            $('#lvl').val(lvl);
            $('#ins').val(ins);
            $('#modal_detail').modal('show');
        }

        // FUNGSI UPDATE DATA AKUN
        function update_data(obj) {
            const form = new FormData(obj);
            let title = `Apa anda yakin ingin memperbarui data ?`;
            SweetAlert(title).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "put",
                        url: `{{ route('update_akun') }}`,
                        data: {
                            id: form.get('id_akun'),
                            user: form.get('user'),
                            lvl: form.get('lvl'),
                            ins: form.get('ins'),
                            pass: form.get('pass'),
                        },
                        beforeSend: function() {
                            Swal.fire({
                                html: '<div style="height:50px"><div class="spinner-border text-danger" role="status"></div></div>',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                background: 'transparent',
                            });
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Success'
                                });
                                $('#modal_detail').modal('hide');
                                get_data_akun()
                            }
                        },
                        error: function(response) {
                            Swal.fire('Error', '', 'error')
                        }
                    })
                }
            })
        }

        // FUNGSI HAPUS AKUN
        function hapus_akun(id) {
            let title = 'Apa anda yakin ingin menghapus data ?';
            SweetAlert(title).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: `{{ route('hapus_akun') }}&id=${id}`,
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Success'
                                });
                                get_data_akun()
                            }
                        },
                        error: function(response) {
                            Swal.fire('Error', '', 'error')
                        }
                    })
                }
            })
        }
    </script>
@endsection
