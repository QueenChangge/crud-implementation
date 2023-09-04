@extends('dashboard.full')

@section('isian')
{{Auth::user()->fullname}}
<div class="row mb-0">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="/adminku/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h2 class="mb-1 mb-sm-0">CV - CREATE</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create CV</h4>
        <form class="forms-sample mb-3" method="POST" action="/dashboard/cv/input">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email" placeholder="">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="aboutme" class="col-sm-3 col-form-label">About Me</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="aboutme" name="aboutme" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="place_of_birth" class="col-sm-3 col-form-label">Place of Birth</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="date_of_birth" class="col-sm-3 col-form-label">Date of Birth</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="'17-08-2001'">
            </div>
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="address" name="address" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="nationality" class="col-sm-3 col-form-label">Nationality</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nationality" name="nationality" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
              <select class="form-control col-sm-" id="gender" name="gender">
                <option selected disabled>Choose gender</option>
                <option value="Hindu">Male</option>
                <option value="Hindu">Female</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="weight" class="col-sm-3 col-form-label">Weight</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="weight" name="weight" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="hight" class="col-sm-3 col-form-label">Hight</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="hight" name="hight" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="religion" class="col-sm-3 col-form-label">Religion</label>
            <div class="col-sm-9">
              <select class="form-control col-sm-" id="religion" name="religion">
                <option selected disabled>Choose religion</option>
                <option value="Hindu">Hindu</option>
                <option value="Hindu">Hindu</option>
                <option value="Hindu">Hindu</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="marital_status" class="col-sm-3 col-form-label">Marital Status</label>
            <div class="col-sm-9">
              <select class="form-control col-sm-" id="marital_status" name="marital_status">
                <option selected disabled>Choose marital status</option>
                <option value="Hindu">Married</option>
                <option value="Hindu">Not Married</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="target_position" class="col-sm-3 col-form-label">Target Position</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="target_position" name="target_position" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Ex : 081543123654">
            </div>
          </div>

          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        @if (session('status'))
          <div class="alert alert-danger">
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
    </div>
  </div>


@endsection












