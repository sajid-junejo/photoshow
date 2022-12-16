@extends('layouts.app')


@section('content')


    <section class="py-5 text-center container">
        <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $album->name }}</h1>
            <p class="lead text-muted">{{ $album->description }}</p>
            <p>
            <a href="{{ route('photo.create',$album->id) }}" class="btn btn-primary my-2">Upload Photo</a>
            <a href="/" class="btn btn-secondary my-2">Go Back</a>
            </p>
        </div>
        </div>
    </section>    

    <div class="row">
        @if (count($album->photos) > 0)
            @foreach ($album->photos as $photo)
                <div class="col-4">
                    <div class="card shadow-sm">
                        <img src="/storage/albums/{{ $album->id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}" height="200">
                    <div class="card-body">
                        <h5 class="card-text">{{ $photo->title }}</h5>
                        <p class="card-text">{{ $photo->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('photo.show',$photo->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <small class="text-muted">{{ $photo->size }}</small>
                        </div>
                    </div>
                    </div>
                </div>                
            @endforeach
        @else
            <h3>No Photos Yet.....!</h3>
        @endif    
    </div>



@endsection