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
            <h2 class="mb-1 mb-sm-0">CV - INPUT EDUCATION</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">EDUCATION</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/cv/education">
          @csrf
          <div class="form-group row">
            <label for="range_time" class="col-sm-3 col-form-label">Range Time</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="range_time" name="range_time" placeholder="2015 - 2017">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="spesific_education" class="col-sm-3 col-form-label">Spesific Education</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="spesific_education" name="spesific_education" placeholder="SMA Negeri 1 Bangli">
              </div>
          </div>

          {{-- <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
              <select class="form-control col-sm-" id="gender" name="gender">
                <option selected disabled>Choose gender</option>
                <option value="Hindu">Male</option>
                <option value="Hindu">Female</option>
              </select>
            </div>
          </div> --}}

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        @if (session('status'))
          <div class="alert alert-danger">
            {{session('message')}}
          </div>
        @endif
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
          @endif
      </div>
    </div>
  </div>

@if ($edus != null)
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">EDUCAITON LIST</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-dark mb-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Range</th>
                  <th scope="col">Spesific Education</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($edus as $edu)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$edu->range_time}}</td>
                    <td>{{$edu->spesific_education}}</td>
                    <td>
                          <form action="/dashboard/cv/education-delete/{{$edu->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-icon-text">
                              <i class="mdi mdi-reload btn-icon-prepend"></i> Delete 
                            </button>
                          </form>
                          
                      </td>
                  </tr>
                  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endif
  


@endsection












