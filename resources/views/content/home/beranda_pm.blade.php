@extends('layouts/contentLayoutMaster')

@section('title', 'Beranda')

@section('content')



<div class="row match-height">
  <div class="col-xl-6 col-md-6 col-12">
    <div class="card" style="background: linear-gradient(118deg, #15546b, #105f41);">
      <div class="card-body text-center text-white">
        <table style="width:100%">
          <tr>
            <td colspan="3" style="color:#a7f4f5; font-size:x-large ">SURAT KETERANGAN<hr></td>
          </tr>
          <tr>
            <td style="font-size: medium; color:#fff;">Permintaan </td>
            <td style="width:2em;"></td>
            <td style="font-size: medium; color:#fff; width:11.2em;">Koreksi </td>
          </tr>
          <tr>
            <td style="color:#00ffdd; font-size:small;  height:4em">{{$surat_keterangan}} Permintaan Surat</td>
            <td></td>
            @if(empty($s_k->persetujuan) || $s_k->persetujuan == "disetujui")
            <td style="color:#00ffff; font-size:small;">{{$s_ket1}}  Koreksi Surat</td>
            @else
            <td style="color:#00ffff; font-size:small;">{{$s_ket}}  Koreksi Surat</td>
            @endif 
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6 col-12">
    <div class="card" style="background: linear-gradient(118deg, #105f41, #15546b);">
      <div class="card-body text-center text-white">
        <table style="width:100%">
          <tr>
            <td colspan="3" style="color:#a7f4f5; font-size:x-large ">SURAT TUGAS<hr></td>
          </tr>
          <tr>
            <td style="font-size: medium; color:#fff">Permintaan </td>
            <td ></td>
            <td style="font-size: medium; color:#fff; width:8e11.2emm;">Koreksi </td>
          </tr>
          <tr>
            <td style="color:#00ffdd; font-size:small; height:4em">{{$surat_tugas}} Permintaan Surat</td>
            <td></td>
            @if(empty($s_t->persetujuan) || $s_t->persetujuan == "disetujui")
            <td style="color:#00ffdd; font-size:small;">{{$s_tugas1}} Koreksi Surat</td>
            @else
            <td style="color:#00ffdd; font-size:small;">{{$s_tugas}} Koreksi Surat</td>
            @endif 
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

{{-- SURAT KELUAR INTERNAL & SURAT KELUAR EKSTERNAL --}}
<div class="row match-height">
  <div class="col-xl-6 col-md-6 col-12">
    <div class="card" style="background: linear-gradient(118deg, #551e35, #97351c);">
      <div class="card-body text-center text-white">
        <table style="width:100%">
          <tr>
            <td colspan="3" style="color:#fdcb9b; font-size:x-large ">BERITA ACARA<hr></td>
          </tr>
          <tr>
            <td style="font-size: medium; color:#fff;">Permintaan </td>
            <td style="width:2em;"></td>
            <td style="font-size: medium; color:#fff;  width:11.2em;">Koreksi </td>
          </tr>
          <tr>
            <td style="color:#f3b2c1; font-size:small;  height:4em">{{$berita_acara}} Permintaan Surat</td>
            <td></td>
            @if(empty($b_a->persetujuan) || $b_a->persetujuan == "disetujui")
            <td style="color:#f3b2c1; font-size:small;">{{$b_acara1}}  Koreksi Surat</td>
            @else
            <td style="color:#f3b2c1; font-size:small;">{{$b_acara}}  Koreksi Surat</td>
            @endif 
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-md-6 col-12">
    <div class="card" style="background: linear-gradient(118deg,  #551e35, #97351c);">
      <div class="card-body text-center text-white">
        <table style="width:100%">
          <tr>
            <td colspan="3" style="color:#fdcb9b; font-size:x-large ">SURAT KELUAR INTERNAL<hr></td>
          </tr>
          <tr>
            <td style="font-size: medium; color:#fff">Permintaan</td>
            <td style="width:7em;"></td>
            <td style="font-size: medium; color:#fff;  width:11.2em;">Koreksi</td>
          </tr>
          <tr>
            <td style="color:#f3b2c1; font-size:small; height:3em">{{$surat_internal}} Permintaan Surat</td>
            <td></td>
            @if(empty($s_kin->persetujuan) || $s_kin->persetujuan == "disetujui")
            <td style="color:#f3b2c1; font-size:small;">{{$s_internal1}} Koreksi Surat</td>
            @else
            <td style="color:#f3b2c1; font-size:small;">{{$s_internal}} Koreksi Surat</td>
            @endif 
          </tr>
        </table>
       
      </div>
    </div>
  </div>
</div>


@endsection
