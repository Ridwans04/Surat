@extends('layouts/contentLayoutMaster')

@include('content.master.institusi.script', ['section' => 'title'])
@include('content.master.institusi.script', ['section' => 'vendor-style'])
@include('content.master.institusi.script', ['section' => 'page-style'])
@section('content')
<h3>Table Institusi</h3>

<!-- Role cards -->
<div class="row">
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <span>Total 4 users</span>
        </div>
        <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
          <div class="role-heading">
            <h4 class="fw-bolder">Administrator</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Role cards -->

<h3 class="mt-50">Semua Institusi dengan banyak user di dalamnya</h3>
@include('content.master.institusi.table')

@endsection

@include('content.master.institusi.script', ['section' => 'vendor-script'])
@include('content.master.institusi.script', ['section' => 'page-script'])