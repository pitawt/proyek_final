@extends('layout.main')

@section('container')
    <h1>{{ $film->judul }}</h1>

    <div class="card mb-4">
        <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)">
            <a href="/genre/{{ $film->genre->slug }}" class="text-white text-decoration-none">
            {{ $film->genre->nama }}
            </a>
        </div>
        
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
    <div class="row mb-8">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-yellow">
            <h6>All Comments</h6>
          </div>
          <div class="card-body">
            @forelse ($komentars as $komentar)
              <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
          
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark">
                    {{ $komentar->nama }} 
                    <small class="text-muted"> | {{ $film->created_at->diffForHumans() }}</small>
                  </strong>
                  
                  {{ $komentar->komentar }}
                  
                </p>
                
              </div>
            @empty
                <h6 class="text-muted">no comments yet</h6>
            @endforelse
            
            
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h6>Add a Comment</h6>
          </div>
          <div class="card-body">
            <form method="post" action="/komentar">
              @csrf
              <input type="hidden" name="film_id" value="{{ $film->id }}">
              <div class="mb-3">
                <small>Your Name</small>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              <div class="mb-3">
                <small>Rate</small>
                <select class="form-control" name="rating">
                  <option value="">please choose</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                @error('rating')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              <div class="mb-3">
                <small>Your Review</small>
                <textarea name="komentar" class="form-control" rows="3">{{ old('komentar') }}</textarea>
                @error('komentar')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
              <div class="d-grid gap-2">
                <input type="submit" value="send" class="btn btn-dark btn-sm">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      

      
@endsection

