@extends('dashboard.full')

@section('isian')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">NEED SELECTION</h4> 
      @if (session('status'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>

    @endif
      </p>
      <div class="table-responsive">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Fullname</th>
              <th scope="col">Phone</th>
              <th scope="col">Evidence</th>
              <th scope="col">Detail</th>
              {{-- <th scope="col">Program</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td scope="row">{{$loop->iteration}}</td>
              <td>{{$user->fullname}}</td>
              <td><a href="https://api.whatsapp.com/send?phone=62{{$user->phone}}" target="_blank">{{$user->phone}}</a></td>
              <td>a{{$user->evidence}}</td>
              <td>
                <a href="/dashboard/approving/{{$user->id}}" type="button" class="btn btn-outline-secondary btn-icon-text"> Confirmed <i  class="mdi mdi-file-check btn-icon-append"></i>
                </a>
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