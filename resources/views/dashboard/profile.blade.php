@extends('dashboard.full')

@section('isian')
<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">AVATAR</h4>
          {{-- <canvas id="transaction-history" class="transaction-chart"></canvas>
          <img class="rounded-circle transaction-chart" src="/adminku/assets/images/faces/face15.jpg" alt=""> --}}
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3 items-center">
            <div>
              <img class="rounded-circle" src="{{ asset('storage/faces/'.Auth::user()->profile_photo_path) }}" alt="">
            </div>
          </div>          
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Fullname</h6>
              <p class="text-muted mb-0">{{Auth::user()->fullname}}</p>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Username</h6>
              <p class="text-muted mb-0">{{Auth::user()->username}}</p>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Email</h6>
              <p class="text-muted mb-0">{{Auth::user()->email}}</p>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Phone</h6>
              <p class="text-muted mb-0">{{Auth::user()->phone}}</p>
            </div>
          </div>
          <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
              <h6 class="mb-1">Address</h6>
              <p class="text-muted mb-0">{{Auth::user()->address}}</p>
            </div>
          </div>
          <a href="/change-password"><p class="pt-3 text-muted mb-0">Want to Change Password?</p></a>
        </div>
      </div>
    </div>
    <div class="col-9 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE DATA</h4>
            <form class="forms-sample"  method="POST" action="/dashboard/profile/update/{{Auth::user()->id}}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" name="fullname" class="form-control" id="fullname" value="{{old('fullname', Auth::user()->fullname)}}">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{old('username', Auth::user()->username)}}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email', Auth::user()->email)}}">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone', Auth::user()->phone)}}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{old('address', Auth::user()->address)}}">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
            <div class="text-md-center text-xl-right">
              <a href="/dashboard/students/list"><p class="text-muted mb-0">BACK</p></a>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection