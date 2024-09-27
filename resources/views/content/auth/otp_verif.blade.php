@extends('layouts/fullLayoutMaster')

@section('title', 'Verify OTP')

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title mb-1">Verify OTP</h4>
                    <form id="verifyOtpForm" onsubmit="event.preventDefault(),verifyOtp(this)">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label" for="no_hp">No HP</label>
                            <input class="form-control" id="no_hp" type="text" name="no_hp"
                                placeholder="Masukkan Nomor HP" required />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="otp">OTP</label>
                            <input class="form-control" id="otp" type="text" name="otp"
                                placeholder="Masukkan OTP" required />
                        </div>
                        <button class="btn btn-relief w-100" style="background-color: #1e5c45; color: white"
                            type="submit">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        const verifyOtp = (formData) => {
            const data = new FormData(formData);
            const url = `{{ route('verify.otp') }}`;

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'OTP verified successfully.') {
                        // Handle success, maybe redirect to a protected page
                        window.location.href = "{{ route('beranda.admin') }}";
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred, please try again.');
                });
        }

    </script>
@endsection
