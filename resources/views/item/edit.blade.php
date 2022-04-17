@extends('layouts.master')

@section('title')
    Edit Item
@endsection

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{asset('stisla-2.2.0/dist/assets/modules/select2/dist/css/select2.min.css')}}">
@endpush

<form action="/item/{{$item->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$item->name}}" placeholder="Enter Name">
                    @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" value="{{$item->price}}" name="price"  placeholder="Enter Price">
                    @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$item->specs}}</textarea>
                    @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Thumbnail</label>
                    <input type="file" class="form-control" value="{{$item->thumbnail}}" name="thumbnail" placeholder="Enter Thumbnail">
                    @error('thumbnail')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" multiple="multiple" name="category[]">
                        @foreach ($category as $temp)
                        <option value="{{$temp-> id}}"
                            @foreach ($item->category as $value)
                                @if($temp->id == $value->id)
                                selected
                                @endif
                            @endforeach
                                >{{$temp-> name}}</option>    
                        @endforeach
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary" style="border-radius: 3px">
                    <i class="nav-icon fas fa-edit"></i>
                    Update
                  </button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
  <script src="{{ asset('stisla-2.2.0/dist/assets/modules/select2/dist/js/select2.min.js')}}"></script>
@endpush
@endsection

