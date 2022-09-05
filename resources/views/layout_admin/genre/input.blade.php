@extends('layout_admin.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Data</h1>
    </div>
    <form method="post" action="/dashboard/genre">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="poster" value="">
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control">
            @error('nama')
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
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('change',function(){
            fetch('/dashboard/genre/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>
@endsection