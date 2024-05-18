@extends('layouts/contentLayoutMaster')

@include('content.master.master_akun.script', ['section' => 'title'])
@include('content.master.master_akun.script', ['section' => 'vendor-style'])
@include('content.master.master_akun.script', ['section' => 'page-style'])

@section('content')
    <h3>Akun dan Level</h3>
    <p>Tiap Level (Super Admin, Admin, PJ) dan juga dibagi menjadi per institusi</p>

    <!-- Permission Table -->
    <div class="card">
        <div class="card-header p-1">
            <div class="col-md-3" style="margin-left: 7px">
                <button class="btn btn-outline-success me-1" onclick="get_data_akun()">Refresh</button>
                <button type="button" class="btn btn-outline-info text-start" data-bs-toggle="modal"
                    data-bs-target="#modal_add"><i data-feather="plus"></i> Tambah Akun
                </button>
                <div class="modal fade" id="modal_add" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Tambah Akun</h1>
                                </div>
                                <form onsubmit="event.preventDefault(),add_akun()" id="add_akun" class="row gy-1 pt-75">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="user">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="level">Level</label>
                                        <input type="text" id="level" name="level" class="form-control" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="institusi">Institusi</label>
                                        <input type="text" id="institusi" name="institusi" class="form-control" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="text" id="password" name="password" class="form-control" />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="button" onclick="add_akun()" class="btn btn-primary me-1">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive p-1">
            <table id="master_akun" class="table">
            </table>
        </div>

        {{-- MODAL UPDATE DATA --}}
        <div class="modal fade" id="modal_detail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Detail dan Edit Data Akun</h1>
                        </div>
                        <form onsubmit="event.preventDefault(),update_data(this)" id="update_arsip" class="row gy-1 pt-75">
                            <input type="hidden" name="id_akun" id="id_akun">
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="user">Username</label>
                                <input type="text" id="user" name="user" class="form-control" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="lvl">Level</label>
                                <input type="text" id="lvl" name="lvl" class="form-control" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ins">Institusi</label>
                                <input type="text" id="ins" name="ins" class="form-control" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="pass">Password</label>
                                <input type="text" id="pass" name="pass" class="form-control" />
                            </div>
                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Permission Table -->

    @include('content/_partials/_modals/modal-add-permission')
    @include('content/_partials/_modals/modal-edit-permission')
@endsection

@include('content.master.master_akun.script', ['section' => 'vendor-script'])
@include('content.master.master_akun.script', ['section' => 'page-script'])