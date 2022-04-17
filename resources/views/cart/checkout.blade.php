@extends('layouts.master')

@section('title')
    Checkout
@endsection

@section('content')
<form action="{{route('cart_order.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$profile->user->name}}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="items">Shipping Address</label>
                        <input type="text" class="form-control" name="shipping_address" placeholder="Address">
                        @error('address')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="my-2">
                            <h4>Total Price: Rp{{Cart::session(auth()->id())->getTotal()}}</h4>
                            <h4>Shipping Cost: Rp{{$cart_order->shipping_cost}}</h4>
                            <button type="submit" class="btn btn-success mt-4">Checkout</button>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection