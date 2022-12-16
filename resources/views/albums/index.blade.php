@extends('layouts.app')

@section('content')

<div class="row">
    @if (count($albums) > 0)
        @foreach ($albums as $album)
            <div class="col-4">
                <div class="card shadow-sm">
                    <img src="/storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->cover_image }}" height="300">
                <div class="card-body">
                    <h5 class="card-text">{{ $album->name }}</h5>
                    <p class="card-text">{{ $album->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('album.show',$album->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> --}}
                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                    </div>
                    <small class="text-muted">{{ $album->name }}</small>
                    {{-- <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small> --}}
                    </div>
                </div>
                </div>
            </div>                
        @endforeach
    @else
        <h3>No Album Yet.....!</h3>
    @endif    
</div>
@endsection