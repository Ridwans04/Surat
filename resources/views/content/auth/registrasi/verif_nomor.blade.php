<div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
    <div class="content-header mb-2">
        <h2 class="fw-bolder mb-75">Kirim ode OTP</h2>
        <span>Gunakan nomer WA untuk menerima OTP</span>
    </div>
    <div class="row">
        <div class="col-md-6 mb-1">
            <label class="form-label" for="no_telp">Nomor Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control mobile-number-mask"
                placeholder="cth : 08712345678" />
            <label class="form-label mt-2" for="otp">Kode OTP</label>
            <input type="text" name="otp" id="otp" class="form-control" placeholder="*****" />
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label" for="captcha">Konfirmasi Captcha</label>
            <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" data-callback="captchaVerified"
                data-expired-callback="captchaExpired">
            </div>
            <button onclick="sendOTP()" id="btn_otp" type="button" class="btn btn-outline-primary"
                style="margin-top: 8px">Kirim kode otp</button>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-2">
        <button class="btn btn-danger btn-prev">
            <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button type="submit" class="btn btn-primary" id="btn_submit">
            <span class="align-middle d-sm-inline-block d-none">Submit</span>
            <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
        {{-- <button class="btn btn-primary btn-next" id="btn_next2">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
        </button> --}}
    </div>
</div>

@push('sub-script')
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6Le8NW8qAAAAADs_SqqfWUE-nZJCaITleHE9CXk7', {
                    action: 'LOGIN'
                });
            });
        }

        function sendOTP() {
            const mobileNumber = document.getElementById('no_telp').value;

            fetch('{{ route('send_otp') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        mobile_number: mobileNumber
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toast.fire({
                            icon: "success",
                            timer: 1500,
                            text: data.message ? data.message : "",
                        });
                    } else {
                        alert(data.message); // Tampilkan pesan error jika gagal
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Fungsi yang dipanggil ketika CAPTCHA diverifikasi
        function captchaVerified() {
            document.getElementById('btn_submit').disabled = false;
        }

        // Fungsi yang dipanggil ketika CAPTCHA expired atau batal
        function captchaExpired() {
            document.getElementById('btn_submit').disabled = true;
        }

        // Nonaktifkan tombol "Next" secara default ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btn_submit').disabled = true;
        });
    </script>
@endpush
