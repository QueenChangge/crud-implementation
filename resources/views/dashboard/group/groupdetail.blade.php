@extends('dashboard.full')

@section('isian')
<div class="row">
     <div class="col-lg-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">CLASS : {{$group->name}}</h2>
        {{-- <p class="card-description"> Add class <code>.table-bordered</code> --}}
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> First name </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($group->program->user as $user)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$user->fullname}} </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="text-md-center text-xl-right pt-3">
            <a href="/dashboard/group/list"><p class="text-muted mb-0">BACK</p></a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection