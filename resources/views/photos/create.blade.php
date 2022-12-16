@extends('layouts.app')

@section('content')

        <div class="card p-2 m-2 bg-secondary text-light">
            <div class="card-header"> <h1>Upload Photo</h1> </div>
            <div class="card-body">
                <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="album-id" value="{{ $albumId }}">
                    <div class="form-group">
                        <label for="title">Photo Title</label>
                        <input id="title" class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Photo Description</label>
                        <input id="description" class="form-control" type="text" name="description">
                    </div>
                    <div class="form-group">
                        <label for="photo">Upload Photo</label>
                        <input id="photo" class="form-control" type="file" name="photo">
                    </div>
                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-primary w-100">submit</button>
                    </div>
                </form>
            </div>
        </div>
    

@endsection