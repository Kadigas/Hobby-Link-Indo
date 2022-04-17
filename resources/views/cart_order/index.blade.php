@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12 col-sm-12">
        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <h1 style="font-weight: bold">ORDER COMPLETED!</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <h3>Thank you for Ordering!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@push('scripts')
    @auth
    <script src="{{asset('adminlte/dist/js/swal.min.js')}}"></script>
    <script>
        Swal.fire({
            title: "Success!",
            icon: "success",
            confirmButtonText: "OK",
        });
    </script>
    @endauth
@endpush