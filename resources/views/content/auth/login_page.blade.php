@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
@php
 $imagePath = 'images/pages/bg_login.jpeg' ; 
@endphp
    <div class="auth-wrapper auth-basic px-2" style="background: url('{{ asset($imagePath) }}'); background-size: cover;">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0" style="border-radius: 30px">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <img src="{{ asset('images/logo/login_icon.png') }}" class="img-fluid rounded-top rounded-bottom"
                            alt="">
                    </a>

                    <h4 class="card-title mb-1">Welcome to E-Surat! 📜</h4>
                    <p class="card-text mb-2">Please sign-in to your account</p>

                    <form class="auth-login-form mt-2" onsubmit="event.preventDefault(),login(this)">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="username">Username/NIP</label>
                            <input class="form-control" id="username" type="text" name="username"
                                placeholder="Masukkan Username Pengguna" aria-describedby="login-email" tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Kata Sandi</label>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle" style="flex-wrap: nowrap">
                                <input class="form-control" id="password" type="password" name="password"
                                    placeholder="············" aria-describedby="login-password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"
                                    style="border: 2px solid #7e7e81"><i
                                        data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-relief w-100" style="background-color: #1e5c45; color: white" tabindex="4">Masuk</button>
                    </form>
                    <form id="setsession" action="{{ route('setSession') }}" method="POST">
                        @csrf
                        <input type="hidden" id="token" name="token">
                    </form>
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-login.js')) }}"></script>
    <script>
        const login = (formData) => {
            success_msg = "Signed in successfully";
            warning_msg = "Username Atau Password Salah";
            error_msg = "error";
            const data = new FormData(formData);
            const url = `{{ route('authenticate') }}`;
            ajax(url, data, 'POST');
        }
    </script>
@endsection
