@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    @php
        $imagePath = 'images/pages/bg_login.jpeg';
    @endphp
    <div class="auth-wrapper auth-basic px-2" style="background: url('{{ asset($imagePath) }}'); background-size: cover;">
        <div class="auth-inner my-2">
            <div class="card mb-0" style="border-radius: 30px">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <img src="{{ asset('images/logo/login_icon.png') }}" class="img-fluid rounded-top rounded-bottom"
                            alt="">
                    </a>

                    <h4 class="card-title mb-1">Welcome to E-Surat! 📜</h4>
                    <p class="card-text mb-2">Please sign-in to your account</p>

                    <form id="authenticateForm" onsubmit="event.preventDefault(),authenticate(this)">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="nip">Username/NIP</label>
                            <input class="form-control" id="nip" type="text" name="nip"
                                placeholder="Masukkan Username Pengguna" required />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Kata Sandi</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle" style="flex-wrap: nowrap">
                                <input class="form-control" id="password" type="password" name="password"
                                    placeholder="············" required />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-relief w-100 mb-1 font-small-3" type="submit"
                            style="background-color: #1e5c45; color: white" tabindex="4">LOGIN</button>
                    </form>
                    <span class="d-flex justify-content-center fw-bolder font-small-4"> ATAU</span>
                    <a class="btn btn-relief w-100 mt-1 font-small-3" style="background-color: #1e5c45; color: white"
                        href="{{ route('redirect.google') }}">LOGIN DENGAN GOOGLE</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-login.js')) }}"></script>
    <script>
        // const authenticate = (formData) => {
        //     const data = new FormData(formData);
        //     const url = `{{ route('authenticate') }}`;

        //     fetch(url, {
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        //             },
        //             body: data
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 // Redirect to OTP verification page or show success message
        //                 alert('OTP Sent! Redirecting to OTP verification page...');
        //                 window.location.href = "{{ route('otp_verif_page') }}";
        //             } else {
        //                 // Show error message
        //                 alert(data.message);
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('An error occurred, please try again.');
        //         });
        // }

        const authenticate = (formData) => {
            success_msg = "Login Anda Berhasil";
            warning_msg = "Username Atau Password Salah";
            error_msg = "error";
            const data = new FormData(formData);
            const url = `{{ route('authenticate') }}`;
            ajax(url, data, 'POST');
        }
    </script>
@endsection
