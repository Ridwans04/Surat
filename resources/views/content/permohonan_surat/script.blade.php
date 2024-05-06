@section('title', 'Permohonan Surat')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap"
        rel="stylesheet">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-email.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/modal-create-app.css')) }}">
@endsection

<!-- Sidebar Area -->
@section('content-sidebar')
    @include('content/permohonan_surat/sidebar')
@endsection


@section('vendor-script')
    <!-- vendor js files -->
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/app-email.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/components/components-accordion.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/modal-create-app.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset('js/scripts/tool/sweet-alert.js') }}"></script>
    <script src="{{ asset('js/scripts/tool/toast.js') }}"></script>
    <script>
        // FUNGSI SWAL FIRE
        function SweetAlert(title) {
            return Swal.fire({
                icon: "question",
                title: title,
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                customClass: {
                    popup: 'swal2-dark-theme', // Apply the dark theme to the modal
                    title: 'swal2-dark-theme', // Apply to the title
                    confirmButton: 'swal2-dark-theme', // Apply to the confirm button
                    cancelButton: 'swal2-dark-theme', // Apply to the cancel button
                },
            })
        }
        // FUNGSI MENAMPILKAN PILIHAN INSTITUSI
        document.addEventListener('DOMContentLoaded', function() {
            const institusi = $('#user_institusi').val();
            $.ajax({
                type: "GET",
                url: `{{ route('get_ins') }}?ins=${institusi}`,
                dataType: 'JSON',
                success: function(response) {
                    $('#ins_eks').empty().append($('<option>', {
                        value: "Pilih Institusi",
                        text: "Pilih Institusi",
                        selected: true,
                        disabled: true
                    }));
                    $.each(response.data, function(i, item) {
                        $('#ins_eks').append($('<option>', {
                            value: item.nama_institusi,
                            text: item.nama_institusi
                        }));
                    });
                },
                error: function(error) {
                    Swal.fire('Error loading institutions', '', 'error');
                }
            });
            $.ajax({
                type: "GET",
                url: `{{ route('get_list_pj') }}?ins=${institusi}`, // Replace with your actual route
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        const listGroup = $('#list_pj');
                        listGroup.empty();

                        // Loop through the data and create list-group items
                        $.each(response.data, function(index, item) { 
                            const listItem = $('<div>', {
                                onclick: "",
                                href: '#',
                                class: "list-group-item list-group-item-action",
                                html: `<span class="bullet bullet-sm bullet-primary me-1"></span>${item.username}`,
                            });
                            listGroup.append(listItem);
                        });
                    } else {
                        console.error(
                            "Error: Data not loaded successfully.");
                    }
                },
                error: function(error) {
                    console.error("AJAX Error:", error);
                }
            });
        });

        // FORM SURAT KELUAR EKSTERNAL
        function req_surat(jns_surat) {
            const form = new FormData(document.querySelector('form#' + jns_surat));
            const title = 'Apa anda sudah mengecek kembali data yang akan dikirim?';
            SweetAlert(title).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: `{{ route('add_req_surat') }}?jns_surat=${jns_surat}`,
                        processData: false,
                        contentType: false,
                        data: form,
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
                                    icon: "success",
                                    title: "Data berhasil dikirim"
                                });
                                $('#buat_permohonan_surat').modal('hide');
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    title: "Data gagal dihapus"
                                });
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
