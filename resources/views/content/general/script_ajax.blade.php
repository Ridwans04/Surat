<form id="setsession" action="{{ route('setSession') }}" method="POST">
    @csrf
    <input type="hidden" id="token" name="token">
</form>

<script>
    var dataAjax;
    var sweet_loader = `<div style="height:50px;"><div class="spinner-border text-success" role="status"></div></div>`;

    const ajax = (url, data, method) => {
        $.ajax({
            type: method,
            url: url,
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", `Bearer {{ session('token') }}`);
                Swal.fire({
                    html: sweet_loader,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    background: 'transparent',
                });
            },
            dataType: "JSON",
            success: function(response) {
                if (response.status == "success") {
                    Toast.fire({
                        icon: "success",
                        title: success_msg,
                        timer: 1500,
                        text: response.message ? response.message : "",
                    });
                    if (url == `{{ route('registration') }}`) {
                        window.location.href = response.redirect_url;
                    }
                    if (url == `{{ route('authenticate') }}`) {
                        $('#token').val(response.data);
                        console.log(response.data);
                        $('form#setsession').submit();
                    }
                } else {
                    Toast.fire({
                        icon: "warning",
                        title: warning_msg,
                        text: response.message ? response.message : "",
                    });
                }
            },
            error: function(error) {
                Toast.fire({
                    icon: "error",
                    title: error_msg,
                    text: error.responseJSON.message ? error.responseJSON.message : "",
                });
            }
        });
    }


    const ajaxtable = (url, data, method, table, funcSuccess, funcError) => {
        $.ajax({
            type: method,
            url: url,
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", `{{ session('token') }}`);
                if (!table) {
                    Swal.fire({
                        html: sweet_loader,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        background: 'transparent',
                    });
                } else {
                    $(table).block({
                        message: sweet_loader,
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });
                }
            },
            dataType: "JSON",
            success: function(response) {
                swal.close();
                if (response.status == "success") {
                    Toast.fire({
                        icon: "success",
                        title: success_msg,
                        text: response.message ? response.message : "",
                    });
                    funcSuccess(response.data, table);
                } else {
                    Toast.fire({
                        icon: "warning",
                        title: warning_msg,
                        text: response.message ? response.message : "",
                    });
                    funcError();
                }
            },
            error: function(error) {
                swal.close();
                Toast.fire({
                    icon: "error",
                    title: error_msg,
                    text: error.responseJSON.message ? error.responseJSON.message : "",
                });
                funcError();
            }
        });
    }

    // SWAL FIRE QUESTION
    const sa_question = async (title, textyes, textno, text) => {
        var response = await Swal.fire({
            icon: "question",
            title: title,
            text: text,
            showCancelButton: true,
            confirmButtonText: textyes,
            cancelButtonText: textno,
        });
        return response;
    }

    const sa_darkThem = async (title, confirmtext, canceltext) => {
        var response = await Swal.fire({
            icon: "question",
            title: title,
            showCancelButton: true,
            confirmButtonText: confirmtext,
            cancelButtonText: canceltext,
            customClass: {
                popup: 'swal2-dark-theme', // Apply the dark theme to the modal
                title: 'swal2-dark-theme', // Apply to the title
                confirmButton: 'swal2-dark-theme', // Apply to the confirm button
                cancelButton: 'swal2-dark-theme', // Apply to the cancel button
            },
        });
        return response;
    }

    // SWAL FIRE QUESTION WITH INPUT
    const questionWithInput = async (title, textyes, textno, text, labelinput, typeinput, inputValue) => {
        var response = await Swal.fire({
            icon: "question",
            title: title,
            text: text,
            showCancelButton: true,
            confirmButtonText: textyes,
            cancelButtonText: textno,
            text: labelinput,
            input: typeinput,
            inputValue: inputValue
        });
        return response;
    }
</script>
