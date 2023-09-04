@extends('dashboard.full')

@section('isian')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">UPDATE MEETING</h4>

        <form class="forms-sample" method="POST" action="/dashboard/meeting/edit/{{$meet->id}}">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="date" class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date" name="date" placeholder="" autocomplete="new-password" value="{{old('date', $meet->date)}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">Time</label>
            <div class="col-sm-9">
              <input type="time" class="form-control" id="description" name="description" placeholder="" autocomplete="new-password" value="{{old('description', $meet->description)}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="title" class="col-sm-3 col-form-label">Meeting Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{old('title', $meet->title)}}">
            </div>
          </div>
          <div class="form-group row">
            <label for="grade_id" class="col-sm-3 col-form-label">Class</label>
            <div class="col-sm-9">
              <select class="form-control" id="grade_id" name="grade_id">
                @foreach ($grades as $grade)
                    <option value="{{$grade->id}}" @if(old('grade_id', $meet->grade_id) == $grade->id) selected @endif>{{$grade->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/dashboard/meeting/list" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>

@endsection