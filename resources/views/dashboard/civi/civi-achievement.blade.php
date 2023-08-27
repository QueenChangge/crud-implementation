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
            <h2 class="mb-1 mb-sm-0">CV - INPUT ACHIEVEMENT</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">ACHIEVEMENT</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/cv/achievement">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>
          </div>
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

    @if ($achieves != null)
    <div class="col-lg-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">ACHIEVEMENT LIST</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-dark mb-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($achieves as $achieve)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$achieve->name}}</td>
                    <td>
                          <form action="/dashboard/cv/achievement-delete/{{$achieve->id}}" method="POST">
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
  </div>
@endif


@endsection
  













