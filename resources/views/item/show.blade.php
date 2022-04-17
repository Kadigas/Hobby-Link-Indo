@extends('layouts.master')

@section('title')
    <h1 style="font-weight: bold;"> Detail Item</h1>
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-sm-12">

        <div class="card author-box card-primary">
            <div class="card-body">
              <div class="author-box-left mr-4">
                <img alt="image" src="{{asset('images/'.$item->thumbnail)}}" width = "500px">
                <div class="clearfix"></div>
                @auth
                <hr>
                <h4>Add Review: </h4>
                    <form action="/review" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{$item->id}}" id="">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Type something..."></textarea>
                        <div class="form-inline my-2">
                            <i class="fas fa-star"></i>
                            <input name="rating" type="number" class="form-control ml-2" name="price" placeholder="Enter Rating">
                        </div>
                        <input type="submit" class="btn btn-primary my-2" value="Add Review">
                    </form>
                @endauth
              </div>

              <div class="author-box-details mx-5">
                <div class="author-box-name">
                      <h1> {{$item->name}} </h1>
                </div>
                <h2 class="mb-5" titlestyle="margin-top: 10px; font-weight: normal;">Rp{{$item->price}}</h2>
                <div class="author-box-description">
                    <h3 class="text-justify">Description: <h3>
                    <h4 class="text-justify mb-5" style="font-weight: normal;">{{$item->description}}</h4>
                    <h4>Reviews: </h4>
                    @forelse ($item->review as $temp)
                        <div class="media bg-primary my-2">
                            <div class="media-body text-white m-1">
                                <div class="form-inline">
                                    <i class="fas fa-star"></i>
                                    {{$temp->rating}}
                                </div>
                                <h5>" {{$temp->content}} "</h5>
                                <h6 class="m-2 d-flex justify-content-end"> By: {{$temp->user->name}}</h6>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
                
                
              </div>
            </div>

        </div>
    </div>
</div>

@endsection

