@extends('layouts.master')

@section('title')
    <h1 style="font-weight: bold;"> Profile Details</h1>
@endsection

@section('content')

    <div class="section-body">
      <h2 class="section-title">Hi, {{$profile->user->name}}</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <img alt="image" src="{{asset('stisla-master/assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                
              </div>
            </div>
            <div class="profile-widget-description mx-3">
              <div class="profile-widget-name" style="font-weight: bold; margin-bottom: 0px;">
                <h5>{{$profile->user->name}}</h5>
              </div>
              <h6 style="font-weight: normal; margin-bottom: 25px;">{{$profile->user->email}}</h6>
              <h5 style="font-weight: bold; margin-bottom: 0px;">Address : </h5>
              <h6 style="font-weight: normal; margin-bottom: 25px;">{{$profile->address}}</h6>
              <h5 style="font-weight: bold; margin-bottom: 0px;">Phone : </h5>
              <h6 style="font-weight: normal; margin-bottom: 25px;">{{$profile->phone}}</h6>




            </div>
            
          </div>
        </div>
        
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form action="/profile/{{$profile->id}}" method="POST" novalidate="">
              @csrf
              @method('put')
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <!-- Name -->
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" value="{{$profile->user->name}}" class="form-control" type="text" name="name" disabled>
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" value="{{$profile->user->email}}" type="email" class="form-control" name="email" disabled>
                  </div>

                   <!-- Address -->
                   <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" class="form-control" value="{{$profile->address}}" name="address">
                    @error('address')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  
                   <!-- Phone -->
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control" value="{{$profile->phone}}" name="phone">
                    @error('phone')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                 
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Update
                    </button>
                  </div>
                </form>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection

