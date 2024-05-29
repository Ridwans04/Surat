@extends('layouts/contentLayoutMaster')

@include('content.master.surat.script', ['section' => 'title'])
@include('content.master.surat.script', ['section' => 'vendor-style'])
@include('content.master.surat.script', ['section' => 'page-style'])

@section('content')
    <h3>Penanggung Jawab</h3>
    <p>PJ dibagi tiap Institusi</p>

    <div class="card">
        <div class="card-header p-1">
            <div class="col-md-3" style="margin-left: 7px">
                <button class="btn btn-outline-success me-1" onclick="get_data()">Refresh</button>
                <button type="button" class="btn btn-outline-info text-start" data-bs-toggle="modal"
                    data-bs-target="#modal_add"><i data-feather="plus"></i> Tambah Surat
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
                                    <h1 class="mb-1">Tambah Surat</h1>
                                </div>
                                <form onsubmit="event.preventDefault(),add_surat()" id="add_surat" class="row gy-1 pt-75">
                                    <div class="col-12 col-md-12">
                                        <label class="form-label" for="nm_surat">Nama Surat</label>
                                        <input type="text" id="nm_surat" name="nm_surat" class="form-control" />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive p-1">
            <table id="master_surat" class="table">
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

@include('content.master.surat.script', ['section' => 'vendor-script'])
@include('content.master.surat.script', ['section' => 'page-script'])
