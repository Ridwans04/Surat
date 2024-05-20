@extends('layouts/contentLayoutMaster')

@section('title', 'Halaman Informasi')

@section('content')



<div class="row match-height">
  <div class="col-xl-12 col-md-12 col-12">
    <div class="card" style="background: linear-gradient(118deg, #235d72, #0c8355);">
      <div class="card-body text-center text-white">
        <table style="width:100%" >
          <tr>
            <td colspan="6" style="color:#a7f4f5; font-size:x-large ">INFORMASI SURAT KONTRAK<hr></td>
          </tr>
          <tr>
            <td style="font-size: medium; color:#b1ebc2; height:3em" colspan="6">Jumlah Total Data Surat Kontrak Pegawai Raudlatul Jannah</td>
          </tr>
          <tr>
            <td style="color:#00ffe5; font-size:small;  height:3em; width:15em"> Pegawai</td>
            <td style="color:#00ffe5; font-size:small; width:15em">Guru</td>
            <td style="color:#00ffe5; font-size:small; width:15em">Staff IT</td>
            <td style="color:#00ffe5; font-size:small; width:15em">Guru TPA</td>
            <td style="color:#00ffe5; font-size:small; width:15em">Guru Al-Quran</td>
            <td style="color:#00ffe5; font-size:small; width:15em">Part Time</td>
          </tr>
          <tr>
            <td style="color:#fff; height:5em; vertical-align:top">{{$pegawai}} Data</td>
            <td style="color:#fff; vertical-align:top">{{$guru}} Data</td>
            <td style="color:#fff; vertical-align:top">{{$it}} Data</td>
            <td style="color:#fff; vertical-align:top">{{$tpa}} Data</td>
            <td style="color:#fff; vertical-align:top">{{$alquran}} Data</td>
            <td style="color:#fff; vertical-align:top">{{$pt}} Data</td>
          </tr>
        </table>
        <table style="width: 100%" >
            <tr>
                <td style="color:#00ffff; font-size:small; width:16em; height:3em">Kontrak Sementara</td>
                <td style="color:#00ffff; font-size:small; width:16em">Pengganti Cuti</td>
                <td style="color:#00ffff; font-size:small; width:16em">Guru Olahraga</td>
                <td style="color:#00ffff; font-size:small; width:16em">Pembina Ekstrakurikuler</td>
                <td style="color:#00ffff; font-size:small; width:16em">Al-Quran Komite</td>
              </tr>
              <tr>
                <td style="color:#fff; font-size:small; height:4em; vertical-align:top">{{$sm}} Data</td>
                <td style="color:#fff; font-size:small; vertical-align:top">{{$pc}} Data</td>
                <td style="color:#fff; font-size:small; vertical-align:top">{{$olah}} Data</td>
                <td style="color:#fff; font-size:small; vertical-align:top">{{$ekstra}} Data</td>
                <td style="color:#fff; font-size:small; vertical-align:top">{{$komite}} Data</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td style="height:4em; vertical-align:bottom" ><button class="button_uq" onclick="window.location.href='/Surat_Keluar/Surat_Kontrak/Tabel_sk'"><span class="button_left">tabel</span></button></td>
                <td></td>
                <td></td>
              </tr>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
