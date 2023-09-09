@extends('dashboard.full')

@section('isian')
<div class="row">
     <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">CLASS : {{$group->name}}</h2>
        {{-- <p class="card-description"> Add class <code>.table-bordered</code></p> --}}
        
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> First name </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($group->user as $user)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$user->fullname}} </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">MEETING ABSENCE</h2>
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    {{-- <th>Group</th> --}}
                    <th>Meeting</th>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specials as $special)
                    @foreach ($special->meeting as $meeting)
                        @foreach ($meeting->absence as $absence)
                          @if ($special->name == $group->name)
                            <tr>
                              {{-- @if ($loop->first)
                                  <td rowspan="{{ count($meeting->absence) }}">{{ $special->name }}</td>
                              @endif --}}
                              @if ($loop->first)
                                  <td rowspan="{{ count($meeting->absence) }}">{{ $meeting->title }}</td>
                              @endif
                              <td>{{ $absence->user->fullname }}</td>
                              <td>{{ $absence->status }}</td>
                            </tr>
                          @endif
                            
                        @endforeach
                    @endforeach
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
</div>

  <div class="row">
    
  </div>
@endsection