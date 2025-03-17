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
            <h2 class="mb-1 mb-sm-0">GROUP - {{Auth::user()->grade->name }}</h2>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  @if (Auth::user()->role_id != 2)
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
                  <th scope="col">Meeting</th>
                  {{-- <th scope="col">Class Meeting</th> --}}
                  <th scope="col">Program</th>
                  <th scope="col">Edit</th>

                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grades as $grade)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td><a href="/dashboard/group/list/{{$grade->id}}">{{$grade->name}}</a></td>
                    <td>{{$grade->user->count()}}</td>
                    <td>{{$grade->class_meeting}}</td>

                    {{-- @foreach ($grade->program->user as $user)
                    {{$user->fullname}}
                    @endforeach --}}
                    {{-- @foreach ($grade->user as $user)
                        <td>{{$user->count()}}</td>
                    @endforeach --}}
                    {{-- <td>{{$grade->user->count()}}</td> --}}
                    {{-- <td>{{$grade->program->name}}</td> --}}
                    <td>
                      <a href="/dashboard/group/modify/edit/{{$grade->id}}" type="button" class="btn btn-warning btn-icon-text mb-2">
                        <i class="mdi mdi-reload btn-icon-prepend"></i> Edit </a>
                    </td>
                    

                    <td>
                        <form action="/dashboard/group/modify/delete/{{$grade->id}}" method="POST">
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
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create New Group</h4>
          <form class="forms-sample mb-3" method="POST" action="/dashboard/group/create">
            @csrf
            <div class="form-group row">
              <label for="program_id" class="col-sm-3 col-form-label">Program</label>
              <div class="col-sm-9">
                <select class="form-control" id="program_id" name="program_id">
                  @foreach ($programs as $program)
                      <option value="{{$program->id}}">{{$program->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Group Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="">
              </div>
            </div>
            <div class="form-group row">
              <label for="class_meeting" class="col-sm-3 col-form-label">Class Meeting</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="class_meeting" name="class_meeting" placeholder="" autocomplete="new-password">
              </div>
            </div>
        
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
          
        </div>
      </div>
    </div>
  @else
    <div class="col-lg-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Member</h4>
          </p>
          <div class="table-responsive">
            <table class="table table-dark mb-2">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($otherusers as $user)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    {{-- <td><a href="/dashboard/group/list/{{$grade->id}}">{{$grade->program->user}}</a></td> --}}
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->phone}}</td>
                    {{-- @foreach ($grade->program->user as $user)
                    {{$user->fullname}}
                    @endforeach --}}
                    {{-- @foreach ($grade->user as $user)
                        <td>{{$user->count()}}</td>
                    @endforeach --}}
                    {{-- <td>{{$grade->user->count()}}</td> --}}
                    {{-- <td>{{$grade->program ? $grade->program->name : "-"}}</td> --}}
                  </tr>
                  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endif
  
  @if (session('status'))
  <div class="alert alert-success">
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



@endsection