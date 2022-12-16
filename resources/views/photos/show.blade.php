@extends('layouts.app')

@section('content')
    <div class="container">

        <h3> {{ $photo->title }}
        <p> {{ $photo->description }}
            <form action="{{ route('photo.destroy',$photo->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-end">Delete</button>
            </form>
        <a href="{{ route('album.show', $photo->album->id) }}"  class="btn btn-info">Go Back</a>
        <br>
         <small>Size: {{ $photo->size }}</small> 
        <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}">
        <hr>
        {{-- <small>Size: {{ $photo->size }}</small> --}}
    </div>
@endsection