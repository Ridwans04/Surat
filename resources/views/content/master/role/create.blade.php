<div class="vertical-modal-ex">
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form onsubmit="event.preventDefault(),create_data(this)" class="row">
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="user">Nama Role</label>
                        <input type="text" name="role" class="form-control">
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
