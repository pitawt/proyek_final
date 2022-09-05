@extends('layout.main')

@section('container')
    <h1 class="mb-5 text-center">All Genre</h1>
    <div class="container">
        <div class="row">
            @foreach ($genres as $genre)
                <div class="col-md-3 mb-2">
                    <a href="/genre/{{ $genre->slug }}">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/500x500?{{ $genre->nama }}" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">
                                {{ $genre->nama }}
                            </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection