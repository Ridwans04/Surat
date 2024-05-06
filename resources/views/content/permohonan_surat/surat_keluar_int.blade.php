<div id="surat-keluar-internal" class="content" role="tabpanel" aria-labelledby="create-app-frameworks-trigger">
    <div class="card">
        <form onsubmit="event.preventDefault(),req_surat('form_eks')" id="form_eks" method="POST">
            @php
                $ins = Auth::user()->institusi;
            @endphp
            <div class="row">
                <input type="hidden" id="user_institusi"  value="{{$ins}}">
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="ins_eks">Institusi</label>
                        <select name="institusi" class="hide-search form-select" id="ins_eks">
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="ph">Perihal</label>
                        <input type="text" name="perihal" id="ph" class="form-control" placeholder="Tulis Disini"
                             />
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="mb-2">
                        <label class="form-label" for="kepada">Kepada</label>
                        <input type="text" name="kepada" id="kepada" class="form-control" placeholder="Tulis Disini"
                             />
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="mb-1">
                        <div class="form-floating">
                            <textarea class="form-control" name="isi_surat" placeholder="Tulis Isi Surat Disini" id="isi"
                                style="height: 100px"></textarea>
                            <label for="isi">Isi Surat</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-between mt-2">
        <button class="btn btn-primary" type="submit">
            <span class="align-middle d-sm-inline-block d-none">Kirim Permintaan</span>
            <i data-feather="send" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
