@extends('dashboard.full')

@section('isian')
<div class="row mb-0">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="/adminku/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h2 class="mb-1 mb-sm-0">STUDENTS - CREATE</h2>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="/dashboard/students/list" class="btn btn-outline-light btn-rounded get-started-btn">Back</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Students</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/students/create">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" placeholder="yourname@example.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" placeholder="..." autocomplete="new-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="username" name="username" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="address" name="address" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="evidence" class="col-sm-3 col-form-label">Evidence</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="evidence" name="evidence" placeholder="">
            </div>
          </div>
      
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        @if (session('status'))
          <div class="alert alert-success">
            {{session('message')}}
          </div>
        @endif
      </div>
    </div>
  </div>


@endsection












