@extends('dashboard.full')

@section('isian')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">UPDATE PROFILE</h4>

        <form class="forms-sample" method="POST" action="/dashboard/modify/{{$user->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="fullname">Fullname</label>
          <input type="text" name="fullname" class="form-control" id="fullname" value="{{old('fullname', $user->fullname)}}">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" value="{{old('username', $user->username)}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" value="{{old('email', $user->email)}}">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" value="{{old('password', $user->password)}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone', $user->phone)}}">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control" value="{{old('address', $user->address)}}">
        </div>
        <div class="form-group">
          <label for="evidence">Evidence</label>
          <input type="text" name="evidence" id="evidence" class="form-control" value="{{old('evidence', $user->evidence)}}">
        </div>
          <div class="form-group">
            <label for="grade_id">Grade</label>
            <select class="form-control" id="grade_id" name="grade_id" value="{{old('grade_id', $user->grade_id)}}">
              @foreach ($grades as $grade)
                  <option value="{{$grade->id}}" @if(old('grade_id', $user->grade_id) == $grade->id) selected @endif>{{$grade->name}}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="form-group">
            <label for="grade_id">Class</label>
            <select class="form-control" id="grade_id" name="grade_id" value="{{old('grade_id', $user->grade_id)}}">
              <option selected disabled>{{old('grade_id', $user->grade->name)}}</option>
              @foreach ($grades as $grade)
                  <option value="{{$grade->id}}">{{$grade->name}}</option>
              @endforeach
            </select>
          </div> --}}
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/dashboard/modify" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>

@endsection