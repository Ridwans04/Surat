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
    <script src="{{ asset('js/scripts/tool/toast.js') }}"></script>
    <script>
        

        // FUNGSI MENAMPILKAN DATA
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
                            `
                                <button onclick="modal_detail('${val.id}', '${val.username}', '${val.level}', '${val.institusi}')"
                                type="button" class="btn btn-icon btn-success mb-1 text-start">
                                <i data-feather="edit"></i>
                                Edit</button>
                            `
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

        // FUNGSI OTOMATIS MENAMPILKAN DATA
        get_data_akun()

        // FUNGSI TAMBAH AKUN
        function add_akun(){
            const form = new FormData(document.querySelector('form#add_akun'));
            Swal.fire({
                    icon: "question",
                    title: "Ingin Menambahkan Data Akun ?",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
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
            Swal.fire({
                icon: 'question',
                title: `Apa anda yakin ingin memperbarui data ?`,
                showCancelButton: true,
                cancelButtonText: "Tidak",
                confirmButtonText: 'Ya',
                customClass: {
                    popup: 'swal2-dark-theme', // Apply the dark theme to the modal
                    title: 'swal2-dark-theme', // Apply to the title
                    confirmButton: 'swal2-dark-theme', // Apply to the confirm button
                    cancelButton: 'swal2-dark-theme', // Apply to the cancel button
                },
            }).then((result) => {
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
    </script>
@endsection
