@extends('layouts.master')

@section('title')
    Item List 
@endsection

@section('content')
<h2 class="section-title">Item List</h2>
<p class="section-lead mb-4">
    Add, update, delete or view items on this page.
</p>
@auth
<div class="card" style="display: flex; margin-top: -10px">
    <div class="card-header">
        <a href="{{route('item.create')}}" class="btn btn-primary" style="border-radius: 3px">
            <i class="nav-icon fas fa-plus-circle"></i>
            Add Item
        </a>
    </div>
</div>
@endauth
<div class="section-body">
    <div class="row">
     @forelse ($item as $temp)
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
            <img class="card-img-top" src="{{asset('images/'.$temp->thumbnail)}}" alt="Card image cap ">
            <div class="card-body ">
                <h5 class="card-title mb-3">{{$temp->name}}</h5>
                <h6 class="card-subtitle mb-3">Rp{{$temp->price}}</h6>
                @foreach ($temp->category as $tag)
                <span class="badge badge-primary" style="margin-top: -10px; margin-bottom: 10px;">{{$tag->name }}</span>
                @endforeach
                
                <div>
                    @auth
                    <form action="{{route('item.destroy', $temp->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('item.show', $temp->id)}}" class="btn btn-info">Detail</a>
                        <a href="{{route('item.edit', $temp->id)}}" class="btn btn-warning">Edit</a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                        <a href="{{route('cart.add', $temp->id)}}" class="btn btn-success">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            Add to cart
                        </a>
                    </form>
    
                    @endauth
                </div>
                @guest
                <a href="{{route('item.show', $temp->id)}}" class="btn btn-info">Detail</a>
                <a href="{{route('cart.add', $temp->id)}}" class="btn btn-success">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    Add to cart
                </a>
                @endguest      
            </div>
        </article>
      </div>
      @empty
      <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
              <div class="card" style="display: flex; align-items: center;">
                  <div class="card-header">
                  <h4>Empty Data</h4>
              </div>
              <div class="card-body" data-width="100%">
                  <div class="empty-state" data-height="100%">
                      <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                      </div>
                      <h2>We couldn't find any item</h2>
                      <p class="lead">
                       Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                      </p>
                      @auth
                      <a href="{{route('item.create')}}" class="btn btn-primary mt-4">
                          <i class="nav-icon fas fa-plus-circle"></i> 
                          Create a new item</a>
                      @endauth
                  </div>
              </div>
            </article>
        </div>
      @endforelse
    </div>
</div>
@endsection 
