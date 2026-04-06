@push('styles')
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
</style>
@endpush

@extends('layouts.app')

@section('content')

@include('patients.form')

@endsection