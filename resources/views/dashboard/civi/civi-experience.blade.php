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
            <h2 class="mb-1 mb-sm-0">CV - INPUT EXPERIENCE</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">EXPERIENCE</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/cv/experience">
          @csrf
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="position" class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="position" name="position" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="spesific_range_time" class="col-sm-3 col-form-label">Spesific Range Time</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="spesific_range_time" name="spesific_range_time" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="responsibility_1" class="col-sm-3 col-form-label">Responsibility 1</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="responsibility_1" name="responsibility_1" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="responsibility_2" class="col-sm-3 col-form-label">Responsibility 2</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="responsibility_2" name="responsibility_2" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label for="responsibility_3" class="col-sm-3 col-form-label">Responsibility 3</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="responsibility_3" name="responsibility_3" placeholder="">
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

@if ($expers != null)
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">EDUCAITON LIST</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-dark mb-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Positon</th>
                  <th scope="col">Spesific Range Time</th>
                  <th scope="col">Responsibility 1</th>
                  <th scope="col">Responsibility 2</th>
                  <th scope="col">Responsibility 3</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($expers as $exper)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$exper->title}}</td>
                    <td>{{$exper->position}}</td>
                    <td>{{$exper->spesific_range_time}}</td>
                    <td>{{$exper->responsibility_1}}</td>
                    <td>{{$exper->responsibility_2}}</td>
                    <td>{{$exper->responsibility_3}}</td>
                    <td>
                          <form action="/dashboard/cv/experience-delete/{{$exper->id}}" method="POST">
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












