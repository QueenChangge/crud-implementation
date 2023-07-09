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
            <h2 class="mb-1 mb-sm-0">GROUP - MODIFY</h2>
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


<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">GROUP UPDATE</h4> 
      @if (session('status'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>

    @endif
      <div class="table-responsive">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Class Meeting</th>
              
              {{-- <th scope="col">Program</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($groups as $group)
            <tr>
              <td scope="row">{{$loop->iteration}}</td>
              <td>{{$group->name}}</td>
              <td>{{$group->class_meeting}}</td>
              <td>
                <a href="/dashboard/group/modify/edit/{{$group->id}}" type="button" class="btn btn-warning btn-icon-text mb-2">
                  <i class="mdi mdi-reload btn-icon-prepend"></i> Edit </a>

                  <form action="/dashboard/group/modify/delete/{{$group->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-icon-text">
                      <i class="mdi mdi-reload btn-icon-prepend"></i> Delete 
                    </button>
                  </form>
                  
              </td>
              {{-- @if ($user->grade && $user->program)
                <td>{{$user->grade->name}}</td>
                <td>{{$user->program->name}}</td>
              @else
                <td>-</td>
                <td>-</td>
              @endif --}}
                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection