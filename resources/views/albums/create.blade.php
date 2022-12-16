@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('album-store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
          </div>
        <div>
          <label for="cover-image">Cover Image</label>
          <input type="file" class="form-control" id="cover-image" name="cover-image" placeholder="Enter Cover Image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection