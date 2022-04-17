@extends('layouts.master')

@section('title')
    Category List
@endsection

@section('content')
<h2 class="section-title">Category List</h2>
<p class="section-lead">
    Add, update, delete or view categories on this page.
</p>
<div class="row">
    <div class="col-12 col-sm-12">

        <div class="card" style="display: flex;">
            <div class="card" style="display: flex; margin-top: -10px">
                <div class="card-header">
                    @auth
                    <a href="{{route('category.create')}}" class="btn btn-primary" style="border-radius: 3px">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        Add Category
                    </a>
                    @endauth
                </div>
            </div>
            <div class="card-body" data-width="100%">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $key=>$value)
                            <tr>
                                <td>{{$key + 1}}</th>
                                <td>{{$value->name}}</td>
                                <td>
                                    <a href="/category/{{$value->id}}" class="btn btn-info">Show</a>
                                    <a href="/category/{{$value->id}}/edit" class="btn btn-warning">Edit</a>
                                    <form action="/category/{{$value->id}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h1>No Category</h1> 
                        @endforelse              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection 