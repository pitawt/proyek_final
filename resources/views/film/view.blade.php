@extends('layout.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>   
@endif
    <h1 class="mb-3 text-center">All Film</h1>
    <hr>

    @if ($film->count())
        <div class="card mb-3">
            <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
                <a href="/genre/{{ $film[0]->genre->slug }}" class="text-white text-decoration-none">
                {{ $film[0]->genre->nama }}
                </a>
                
            </div>
           

            @if ($film[0]->poster)
            <img src="{{ asset('storage/'. $film[0]->poster) }}" class="card-img-top" alt="...">
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $film[0]->genre->nama }}" class="card-img-top" alt="...">
            @endif



            <div class="card-body text-center">
                <h3 class="card-title">
                    <a href="/film/{{ $film[0]->slug }}" class="text-decoration-none text-dark">
                    {{ $film[0]->judul }} ({{ $film[0]->tahun }})
                    </a>
                </h3>
                <small class="text-muted mb-4">
                    Posted By {{ $film[0]->user->name }} | {{ $film[0]->created_at->diffForHumans() }}
                </small>
                <p class="card-text"> {{ Str::limit($film[0]->ringkasan, 50) }}</p>
                <a href="/film/{{ $film[0]->slug }}" class="card-link text-decoration-none btn btn-dark btn-sm">detail</a>
            </div>
        </div>  

        <div class="container">
            <div class="row">
                @foreach ($films->skip(1) as $film)
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
                            <img src="https://source.unsplash.com/500x400?{{ $film->genre->nama }}" class="card-img-top" alt="{{ $film->judul }}">
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
    @else
        <p class="text-center fs-4">No Film Found</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $films->links() }}
    </div>

    
    


    
@endsection