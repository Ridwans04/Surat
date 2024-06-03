@extends('layouts/contentLayoutMaster')

@include('content.master.surat.script', ['section' => 'title'])
@include('content.master.surat.script', ['section' => 'vendor-style'])
@include('content.master.surat.script', ['section' => 'page-style'])
@section('content')
    @include('content.master.surat.table')
@endsection

@include('content.master.surat.script', ['section' => 'vendor-script'])
@include('content.master.surat.script', ['section' => 'page-script'])
