@extends('layouts/contentLayoutMaster')

@include('content.master.role.script', ['section' => 'title'])
@include('content.master.role.script', ['section' => 'vendor-style'])
@include('content.master.role.script', ['section' => 'page-style'])
@section('content')
    @include('content.master.role.table')
@endsection

@include('content.master.role.script', ['section' => 'vendor-script'])
@include('content.master.role.script', ['section' => 'page-script'])
