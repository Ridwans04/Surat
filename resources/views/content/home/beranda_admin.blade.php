@extends('layouts/contentLayoutMaster')

@section('title', 'Halaman Informasi')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card" style="background: linear-gradient(118deg, hsl(196, 53%, 29%), #0c8355);">
                <div class="card-body text-start ">
                    <table style="width:100%; border:none" class="table align-top">
                        <tr>
                            <td colspan="3" style="color:#a7f4f5; font-size:x-large; text-align:center ">INFORMASI
                                PENGGUNAAN APLIKASI SURAT
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 8em; height: 3em; color:#57cf89; font-size:medium">TOMBOL</td>
                            <td style="width: 15em; color:#57cf89; font-size:medium">NAMA TOMBOL</td>
                            <td style="color:#57cf89; font-size:medium"> KETERANGAN</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-icon btn-info" disabled><i data-feather="file"></i></button></td>
                            <td style="color:#f0f0f0;">Tombol File</td>
                            <td style="color:#f0f0f0;">Digunakan untuk melihat file yang sudah dibuat oleh Admin / Tata
                                Usaha masing - masing institusi</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-icon btn-danger" disabled><i
                                        data-feather="alert-octagon"></i></button></td>
                            <td style="color:#f0f0f0;">Tombol Koreksi Surat</td>
                            <td style="color:#f0f0f0;">Digunakan untuk memberikan koreksi untuk surat yang mempunyai
                                kesalahan dan tidak sesuai dengan yang diharapkan pemohon</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-icon btn-success" disabled><i data-feather="check"></i></button></td>
                            <td style="color:#f0f0f0;">Tombol Disetujui</td>
                            <td style="color:#f0f0f0;">Digunakan untuk memberikan informasi kepada pemohon apabila surat
                                sudah selesai disetujui oleh Policy Maker</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
