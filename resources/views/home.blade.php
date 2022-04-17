@extends('layouts.master')

@section('title')
    Welcome to HobbyLinkIndo!
@endsection

@section('content')
<div class="d-flex justify-content-center">
    <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-75 m-auto">
</div>
@endsection

@push('scripts')
    @auth
    <script src="{{asset('adminlte/dist/js/swal.min.js')}}"></script>
    <script>
        Swal.fire({
            title: "Login Success!",
            icon: "success",
            confirmButtonText: "OK",
        });
    </script>
    @endauth
@endpush