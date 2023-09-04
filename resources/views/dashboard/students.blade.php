@extends('dashboard.full')

@section('isian')
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
            <h2 class="mb-1 mb-sm-0">STUDENTS</h2>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="/dashboard/students/create" class="btn btn-outline-light btn-rounded get-started-btn">Create</a>
            </span>
            <span>
              <a href="/dashboard/modify" class="btn btn-outline-light btn-rounded get-started-btn">Modify</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-0">
  <div class="col-md-5">
    <form class="form-group" action="/dashboard/students/filter" method="get">
      @csrf
      <div class="input-group">
        <input type="text" name='fullname' id="fullname" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button type="submit" class="btn btn-sm btn-info">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>




<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">STUDENT LIST</h4>
        </p>
        <div class="table-responsive">
          <table class="table table-dark mb-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fullname</th>
                <th scope="col">Phone</th>
                <th scope="col">Class</th>
                <th scope="col">Program</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                  <td scope="row">{{$loop->iteration}}</td>
                  <td>{{$user->fullname}}</td>
                  <td>{{$user->phone}}</td>
                  @if ($user->grade_id)
                    <td>{{$user->grade->name}}</td>
                    <td>{{$user->grade->program->name}}</td>
                  @else
                    <td>-</td>
                    <td>-</td>
                  @endif
                </tr>
                
              @endforeach
            </tbody>
          </table>
          {{$users->links()}}
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title mb-1">New Account</h4>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="preview-list">
              @foreach (\App\Models\User::latest()->paginate(5) as $user)
                <div class="preview-item border-bottom">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-primary">
                      <i class="mdi mdi-account-check"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-sm-flex flex-grow">
                    <div class="flex-grow">
                      <h6 class="preview-subject">{{$user->fullname}}</h6>
                      <p class="text-muted mb-0">{{ $user->grade->name ?? '-' }}</p>
                    </div>
                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                      <p class="text-muted">Landing on<br>{{$user->created_at}}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>





@endsection