@extends('layouts.master')

@section('title')
    Edit Category
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
                <form action="/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="name" placeholder="Enter Name">
                        
                        <button type="submit" class="btn btn-primary mt-3" style="border-radius=3px;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
@endsection

