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
            <h2 class="mb-1 mb-sm-0">MATERIALS - CREATE</h2>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="/dashboard/materials/list" class="btn btn-outline-light btn-rounded get-started-btn">Back</a>
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
        <h4 class="card-title">Create New Material</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/materials/create">
          @csrf
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="description" name="description" placeholder="..." autocomplete="new-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="image" name="image" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="icon" class="col-sm-3 col-form-label">Icon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="icon" name="icon" placeholder="">
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












