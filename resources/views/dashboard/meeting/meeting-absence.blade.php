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
            <h2 class="mb-1 mb-sm-0">MEETING ABSENCE - {{$meeting->grade->name}}</h2>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">FILLING ABSENCE</h4>
            <p class="card-description">{{$meeting->grade->name}} / Start : {{$meeting->description}}</p>

            
            <form class="forms-sample pb-5" method="POST" action="/dashboard/meeting/absence/create">
              @csrf
              @foreach ($meeting->grade->user as $index => $user)
              <div class="form-group">
                  <label for="user_id_{{$index}}">{{$user->fullname}}</label>
                  <div class="col-sm-9">
                      <input type="hidden" class="form-control" id="user_id_{{$index}}" name="user_id[]" value="{{$user->id}}">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-9">
                      <input type="hidden" class="form-control" id="meeting_id" name="meeting_id[]" value="{{$meeting->id}}">
                  </div>
              </div>
              <div class="form-group">
                  <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                          <input type="radio" name="status[{{$index}}]" value="Hadir" class="form-check-input"> Hadir 
                      </label>
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                          <input type="radio" name="status[{{$index}}]" value="Sakit" class="form-check-input"> Izin 
                      </label>
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                          <input type="radio" name="status[{{$index}}]" value="Izin" class="form-check-input"> Sakit 
                      </label>
                  </div>
              </div>
              @endforeach
              <button type="submit" class="btn btn-primary mr-2 pt-2">Submit</button>
              <a href="/dashboard/meeting/list" class="btn btn-dark">Cancel</a>
          </form>
          
                
            

    
            
          </div>
        </div>
      </div>
</div>



@endsection
