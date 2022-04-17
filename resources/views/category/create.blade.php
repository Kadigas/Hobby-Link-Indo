@extends('layouts.master')

@section('title')
    Add Category
@endsection

@section('content')
    @error('name')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror

    <div class="col-14 ">
        
    
        <div class="card " style="display: flex; justify-content: center;">
            <div class="card-body" data-width="100%">
                <form action="/category" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        
                        <button type="submit" class="btn btn-primary mt-3" style="border-radius=3px;">Add</button>
                    </div>
                
                    
                </form>
            </div>
        </div>
    </div>

   
@endsection

