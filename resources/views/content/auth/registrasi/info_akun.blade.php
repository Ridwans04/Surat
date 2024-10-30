<div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
    <div class="content-header mb-2">
        <h2 class="fw-bolder mb-75">Informasi Akun</h2>
        <span>Masukkan Username dan Atur Password untuk Akun</span>
    </div>
    <div class="row">
        <div class="col-md-6 mb-1">
            <label class="form-label" for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan disini" />
        </div>
        <div class="col-md-6 mb-1">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="cth@gmail.com" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-1">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge form-password-toggle">
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

            </div>
        </div>
        <div class="col-md-6 mb-1">
            <label class="form-label" for="confirm-password">Confirm Password</label>
            <div class="input-group input-group-merge form-password-toggle">
                <input type="password" name="confirm-password" id="confirm-password" class="form-control"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between float-end mt-2">
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>

@push('sub-script')
    <script>
       
    </script>
@endpush
