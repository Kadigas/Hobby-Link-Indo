@extends('layouts.master')

@section('title')
    ERD
@endsection

@section('content')
<img src="/images/fp_sanber_laravel.png" alt="ERD Cast">
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