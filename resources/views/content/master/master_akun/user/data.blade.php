@extends('layouts/contentLayoutMaster')

@include('content.master.master_akun.user.script', ['section' => 'title'])
@include('content.master.master_akun.user.script', ['section' => 'vendor-style'])
@include('content.master.master_akun.user.script', ['section' => 'page-style'])

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
                            <div class="card">
                                <div class="card-header p-1">
                                    <div class="col-md-3" style="margin-left: 7px">
                                        <button class="btn btn-outline-success me-1"
                                            onclick="get_user_role()">Refresh</button>
                                    </div>
                                </div>
                                <div class="card p-1">
                                    <table class="datatables-basic table" id="user_role">
                                    </table>
                                </div>

                                {{-- MODAL UPDATE DATA --}}
                                {{-- <div class="modal fade" id="modal_detail" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                                <div class="text-center mb-2">
                                                    <h1 class="mb-1">Detail dan Edit Data Akun</h1>
                                                </div>
                                                <form onsubmit="event.preventDefault(),update_data(this)" id="update_arsip"
                                                    class="row gy-1 pt-75">
                                                    <input type="hidden" name="id_akun" id="id_akun">
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label" for="user">Nama Role</label>
                                                        <input type="text" id="user" name="user"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="col-12 text-center mt-2 pt-50">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('content/_partials/_modals/modal-add-permission')
    @include('content/_partials/_modals/modal-edit-permission')
@endsection

@include('content.master.master_akun.user.script', ['section' => 'vendor-script'])
@include('content.master.master_akun.user.script', ['section' => 'page-script'])
