{{-- MODAL UPDATE DATA --}}
<div class="vertical-modal-ex">
    <!-- Modal -->
    <div class="modal fade" id="modal_update" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Institusi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2">
                    <form onsubmit="event.preventDefault(),update_data(this)" id="update_data" class="row">
                        @method('PATCH')
                        <input type="hidden" name="id_ins" id="id_ins">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="user">Nama Role</label>
                            <input type="text" name="nama_role" id="nm_role" class="form-control">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="user">Inisial Institusi</label>
                            <input type="text" name="initial_role" id="int_role" class="form-control">
                        </div>
                        <div class="col-12 text-center mt-2">
                            <button type="submit" class="btn btn-primary me-1">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>