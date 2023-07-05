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
            <h2 class="mb-1 mb-sm-0">MATERIALS</h2>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="/dashboard/materials/create" class="btn btn-outline-light btn-rounded get-started-btn">Create</a>
            </span>
            <span>
              <a href="/dashboard/materials/modify" class="btn btn-outline-light btn-rounded get-started-btn">Modify</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
@foreach ($materials as $key=>$material)
    <div class="col-sm-3 grid-margin h-100" role="button">
      <div class="card">
        <div class="card-body">
          <h5>Material {{$key+1}}</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <a href="/dashboard/materials/list/{{$material->id}}"><h4 class="mb-0">{{$material->title}}</h4></a>
                <p class="text-success ml-2 mb-0 font-weight-medium"></p>
              </div>
              <p class="text-muted font-weight-normal">Updated on {{$material->created_at}}</p>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
</div>

@endsection