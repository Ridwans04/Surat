@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')


@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2" style="max-width: 450px">
            <!-- Register basic -->
            <div class="card mb-0 w-100">
                <div class="card-body mb-0 p-3">
                    <a href="#" class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="35">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill: currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h1 class="brand-text text-primary">&nbsp;LettEase</h1>
                    </a>

                    {{-- <h4 class="card-title text-center mb-1">Halaman Registrasi 🔒</h4> --}}
                    <h2 class="fw-bolder text-center mb-75">Halaman Registrasi 🔒</h2>

                    <form class="auth-register-form mt-2" onsubmit="event.preventDefault(), registration">
                        <div class="row">
                            <div class="mb-1">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukkan disini" required />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        required />
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                            <div class=" mb-1">
                                <label class="form-label" for="no_telp">Nomor Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control mobile-number-mask"
                                    placeholder="cth : 08712345678" required />
                            </div>
                            <div class="col-md-7 mb-1">
                                <label class="form-label" for="otp">Kode OTP</label>
                                <input type="text" name="otp" id="otp" class="form-control"
                                    placeholder="*****" required />
                            </div>
                            <div class="col-md-5 mb-1" style="margin-top: 1.1em">
                                <button onclick="sendOTP()" id="btn_otp" type="button"
                                    class="btn btn-lg w-100 btn-outline-primary" style="margin-top: 8px"><i
                                        data-feather="send"></i> OTP</button>
                            </div>
                            <div id="captcha-container" class="w-100 mb-2" style="display: none; margin-top: 8px;">
                                <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"
                                    data-callback="captchaVerified" data-expired-callback="captchaExpired">
                                </div>
                            </div>
                            <div class=" mb-1">
                                <button class="btn text-center btn-primary w-100" tabindex="5">Daftar</button>
                            </div>
                    </form>

                    <p class="text-center mt-2">
                        <span>Apakah anda sudah memiliki akun?</span>
                        <a href="{{ route('login') }}">
                            <span>Login Sekarang</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register basic -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset(mix('js/scripts/pages/auth-register.js')) }}"></script>
    <script>
        function sendOTP() {
            document.getElementById("captcha-container").style.display = "block";
        }

        function captchaVerified() {
            const mobileNumber = document.getElementById('no_telp').value;

            // Kirim OTP setelah captcha terverifikasi
            fetch('{{ route('send_otp') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        mobile_number: mobileNumber
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toast.fire({
                            icon: "success",
                            timer: 1500,
                            text: data.message ? data.message : "",
                        });
                    } else {
                        alert(data.message); // Tampilkan pesan error jika gagal
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        const registration = (formData) => {
            success_msg = "Registrasi Berhasil";
            warning_msg = "Registrasi Gagal";
            error_msg = "Error";
            const data = new FormData(formData);
            const url = `{{ route('registration') }}`;
            ajax(url, data, 'POST');
        }
    </script>
@endsection
