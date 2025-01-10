@extends('layouts/contentLayoutMaster')

@include('content.master.akun.user.script', ['section' => 'title'])
@include('content.master.akun.user.script', ['section' => 'vendor-style'])
@include('content.master.akun.user.script', ['section' => 'page-style'])

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="accordion accordion-margin" id="accordionMargin">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMarginOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne"><i
                                data-feather="user-plus" class="me-1"></i>
                            TABEL DATA USER ROLE
                        </button>
                    </h2>
                    <div id="accordionMarginOne" class="accordion-collapse collapse show" aria-labelledby="headingMarginOne"
                        data-bs-parent="#accordionMargin">
                        <div class="accordion-body">
                            @include('content.master.akun.user.user_role.table')
                        </div>
                            @include('content.master.akun.user.user_role.edit')
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingMarginTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo"><i
                                data-feather="user-plus" class="me-1"></i>
                            TABEL DATA USER INSTITUSI
                        </button>
                    </h2>
                    <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo"
                        data-bs-parent="#accordionMargin">
                        <div class="accordion-body">
                            @include('content.master.akun.user.user_institusi.table')
                        </div>
                            @include('content.master.akun.user.user_institusi.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('content.master.akun.user.script', ['section' => 'vendor-script'])
@include('content.master.akun.user.script', ['section' => 'page-script'])
