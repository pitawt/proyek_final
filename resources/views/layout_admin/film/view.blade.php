@extends('layout_admin.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>
    @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>   
        @endif
    <a href="/dashboard/film/create" class="btn btn-dark btn-sm mb-2">create data</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Genre</th>
              <th scope="col">Tahun</th>
              <th scope="col">Judul</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody> 
           @foreach($films as $film)
               <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $film->genre->nama }}</td>
                <td>{{ $film->tahun }}</td>
                <td>{{ $film->judul }}</td>
                <td>
                    <form method="post" action="/dashboard/film/{{ $film->slug }}">
                        @csrf
                        @method('delete') 
                        <a href="/dashboard/film/{{ $film->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        <a href="/dashboard/film/{{ $film->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                        <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')" value="delete"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
               </tr>
           @endforeach
          </tbody>
        </table>
      </div> 
@endsection