@extends('layout_admin.main')

@section('container')
    <div class="card mb-3 mt-3">
        
        @if ($film->poster)
        <img src="{{ asset('storage/'. $film->poster) }}" class="card-img-top" alt="...">
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $film->genre->nama }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body text-center">
            <h3 class="card-title">
                <a href="/film/{{ $film->slug }}" class="text-decoration-none text-dark">
                {{ $film->judul }} ({{ $film->tahun }})
                </a>
            </h3>
            <small class="text-muted mt-0">
                By {{ $film->user->name }} | {{ $film->created_at->diffForHumans() }}
            </small>
            <p class="card-text">{!! $film->ringkasan !!}</p>
            
        </div>
    </div>  

    
@endsection