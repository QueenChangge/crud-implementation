@extends('dashboard.full')

@section('isian')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">UPDATE GROUP</h4>

        <form class="forms-sample" method="POST" action="/dashboard/group/modify/edit/{{$group->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Group Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{old('name', $group->name)}}">
        </div>
        <div class="form-group">
          <label for="class_meeting">Class Meeting</label>
          <input type="number" name="class_meeting" class="form-control" id="class_meeting" value="{{old('class_meeting', $group->class_meeting)}}">
        </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/dashboard/group/modify" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>

@endsection