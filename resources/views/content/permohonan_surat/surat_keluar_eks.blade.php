<div id="surat-keluar-eksternal" class="content" role="tabpanel" aria-labelledby="create-app-details-trigger">
    <form onsubmit="event.preventDefault(),req_surat('form_eks')" id="form_eks" method="POST">
        @php
            $user = Auth::user();
            $date = Carbon::now()->toDateString();
        @endphp
        <div class="row">
            {{-- MENGAMBIL DATA USER PEMBUAT PERMINTAAN --}}
            <input type="hidden" name="user_institusi" id="user_institusi" value="{{ $user->institusi }}">
            <input type="hidden" name="pemohon" id="pemohon" value="{{ $user->username }}">
            <input type="hidden" name="tgl_permintaan" id="tgl_permintaan" value="{{ $date }}">

            {{-- FORM UTAMA --}}
            @if($user->institusi == 'Preschool')
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="ins_eks">Institusi</label>
                    <select name="institusi" class="hide-search form-select" id="ins_eks">
                    </select>
                </div>
            </div>
            @endif
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label" for="ph">Perihal</label>
                    <input type="text" name="perihal" id="ph" class="form-control"
                        placeholder="Tulis Disini" />
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="mb-2">
                    <label class="form-label" for="kepada">Kepada</label>
                    <input type="text" name="kepada" id="kepada" class="form-control"
                        placeholder="Tulis Disini" />
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="mb-1 mt-1">
                    <div class="form-floating">
                        <textarea class="form-control" name="isi_surat" placeholder="Tulis Isi Surat Disini" id="isi"
                            style="height: 100px"></textarea>
                        <label for="isi">Isi Surat</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" id="confirm-text" type="submit">
                    <span class="align-middle d-sm-inline-block d-none">Kirim Permintaan</span>
                    <i data-feather="send" class="align-middle ms-sm-25 ms-0"></i>
                </button>
            </div>
        </div>
    </form>
</div>