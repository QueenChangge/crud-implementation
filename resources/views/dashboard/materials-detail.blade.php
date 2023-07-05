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
            <h2 class="mb-1 mb-sm-0">MATERIALS - {{$material->title}}</h2>
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



<div class="row">
    <div class="col-md-4 col-xl-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">{{$material->title}}</h2>
            <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
              <div class="item">
                <img src="/adminku/assets/images/dashboard/Rectangle.jpg" alt="">
              </div>
            </div>
            <div class="d-flex py-4 ">
              <div class="preview-list w-100">
                <div class="preview-item p-0">
                  <div class="preview-item-content d-flex flex-grow ">
                    <div class="flex-grow">
                      <p class="text-muted">Updated on {{$material->created_at}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="text-muted">{{$material->description}}</p>
            <div class="progress progress-md portfolio-progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection