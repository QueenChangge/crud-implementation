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
            <h2 class="mb-1 mb-sm-0">GROUP</h2>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
            <span>
              <a href="/dashboard/group/create" class="btn btn-outline-light btn-rounded get-started-btn">Create</a>
            </span>
            <span>
              <a href="/dashboard/group/modify" class="btn btn-outline-light btn-rounded get-started-btn">Modify</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">GROUP LIST</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-dark mb-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Numbers of Person</th>
                  {{-- <th scope="col">Class Meeting</th> --}}
                  <th scope="col">Program</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grades as $grade)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td><a href="/dashboard/group/list/{{$grade->id}}">{{$grade->name}}</a></td>
                    <td>{{$grade->program->user->count()}}</td>
                    {{-- @foreach ($grade->program->user as $user)
                    {{$user->fullname}}
                    @endforeach --}}
                    {{-- @foreach ($grade->user as $user)
                        <td>{{$user->count()}}</td>
                    @endforeach --}}
                    {{-- <td>{{$grade->user->count()}}</td> --}}
                    <td>{{$grade->program ? $grade->program->name : "-"}}</td>
                  </tr>
                  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection