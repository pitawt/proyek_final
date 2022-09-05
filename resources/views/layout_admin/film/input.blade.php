@extends('layout_admin.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Data</h1>
    </div>
    <form method="post" action="/dashboard/film" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="poster" value="">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="form-control">
            @error('judul')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
            @error('slug')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="text" name="tahun" value="{{ old('tahun') }}" class="form-control">
            @error('tahun')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select class="form-control" name="genre_id">
                @foreach ($genres as $genre)
                @if(old('genre_id') == $genre->id)
                    <option value="{{ $genre->id }}" selected>{{ $genre->nama }}</option>
                @else
                    <option value="{{ $genre->id }}">{{ $genre->nama }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Poster</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input type="file" class="form-control" name="poster" id="poster" onchange="previewImage()">
            @error('poster')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <input id="ringkasan" type="hidden" name="ringkasan" value="{{ old('ringkasan') }}">
            <trix-editor input="ringkasan"></trix-editor>
            @error('ringkasan')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change',function(){
            fetch('/dashboard/film/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        function previewImage(){
            const poster = document.querySelector('#poster');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(poster.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
        
    </script>
@endsection