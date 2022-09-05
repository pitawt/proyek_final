@extends('layout.main')

@section('container')
    <h1 class="mb-3 text-center">all genre : {{ $genre }}</h1>
    <hr>
    <div class="container">
        <div class="row">
            @foreach ($films as $film)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                            <a href="/genre/{{ $film->genre->slug }}" class="text-white text-decoration-none">
                            {{ $film->genre->nama }}
                            </a>
                        </div>
                        @if ($film->poster)
                            <img src="{{ asset('storage/'. $film->poster) }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $film->genre->nama }}" class="card-img-top" alt="...">
                        @endif


                        <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="/film/{{ $film->slug }}" class="text-decoration-none text-dark">
                            {{ $film->judul }} ({{ $film->tahun }})
                            </a>
                        </h5>
                        <p class="card-text">{!! $film->ringkasan !!}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        </ul>
                        <div class="card-body">
                        <a href="/film/{{ $film->slug }}" class="card-link text-decoration-none btn btn-dark btn-sm">detail </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    


    
@endsection