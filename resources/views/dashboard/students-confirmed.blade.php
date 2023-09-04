

@extends('dashboard.full')

@section('isian')
<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">{{$user->fullname}}</h4>
        <p class="card-description"> Add class, program, and activate account </p>

        <form class="forms-sample" method="POST" action="/dashboard/approving/{{$user->id}}">
        @csrf
        @method('PUT')
          {{-- <div class="form-group">
            <label for="program_id">Program</label>
            <select class="form-control" id="program_id" name="program_id" value="{old('program_id')}">
              <option selected disabled>Choose program</option>
              @foreach ($programs as $program)
                  <option value="{{$program->id}}">{{$program->name}}</option>
              @endforeach
            </select>
          </div> --}}
          <div class="form-group">
            <label for="grade_id">Grade</label>
            <select class="form-control" id="grade_id" name="grade_id" value="{old('grade_id')}">
              <option selected disabled>Choose group</option>
              @foreach ($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->name}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="form-check form-check-flat form-check-primary">
            <label class="form-check-label">
              <input type="checkbox" name="status" id="status" value="active" class="form-check-input" checked> Activated Account </label>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/dashboard/approving" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>

@endsection

