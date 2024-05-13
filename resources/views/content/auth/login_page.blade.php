@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Halaman Login')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-cover">
  <div class="auth-inner row m-0">

    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center">
      <div class="d-lg-flex align-items-center justify-content-center">
        @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/pages/Login.jpg')}}" alt="Login V2" />
          @else
          <img class="img-fluid" src="{{asset('images/pages/Login.jpg')}}" alt="Login V2" />
          @endif
      </div>
    </div>
    <!-- /Left Text-->

    <!-- Login-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-7">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <img src="{{asset('images/logo/login_icon.png')}}" class="img-fluid rounded-top rounded-bottom" alt="">
        <h2 class="card-title fw-bold mb-1">Selamat Datang Di E-Surat 📜</h2>
        <form class="auth-login-form mt-2" onsubmit="event.preventDefault(),login(this)">
          @csrf
          <div class="mb-1">
            <label class="form-label" for="username">Nama</label>
            <input class="form-control" id="username" type="text" name="username" placeholder="Masukkan Nama Pengguna" aria-describedby="login-email" autofocus="" tabindex="1" />
          </div>
          <div class="mb-1">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Kata Sandi</label>
              </a>
            </div>
            <div class="input-group input-group-merge form-password-toggle" style="flex-wrap: nowrap">
              <input class="form-control" id="password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
              <span class="input-group-text cursor-pointer" style="border: 2px solid #404656
              "><i data-feather="eye"></i></span>
            </div>
          </div>
          <button class="btn btn-relief btn-success w-100" tabindex="4">Masuk</button>
        </form>
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
<script src="{{ asset(mix('js/scripts/extensions/ext-component-toastr.js')) }}"></script>
@endsection
