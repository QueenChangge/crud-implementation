@extends('dashboard.full')

@section('isian')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">UPDATE MATERIAL</h4>

        <form class="forms-sample" method="POST" action="/dashboard/materials/modify/edit/{{$material->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" value="{{old('title', $material->title)}}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" class="form-control" id="description" value="{{old('description', $material->description)}}">
        </div>
        <div class="form-group">
          <label for="image">image</label>
          <input type="text" name="image" class="form-control" id="image" value="{{old('image', $material->image)}}">
        </div>
        <div class="form-group">
          <label for="icon">icon</label>
          <input type="text" name="icon" class="form-control" id="icon" value="{{old('icon', $material->icon)}}">
        </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/dashboard/materials/modify" class="btn btn-dark">Cancel</a>
        </form>
      </div>
    </div>
  </div>

@endsection