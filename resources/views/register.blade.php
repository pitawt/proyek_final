@extends('layout.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
        <main class="form-signin">
          <form method="post" action="/register">
            @csrf
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control rounded-top" value="{{ old('email') }}">
                @error('email')
                  <p class="text-danger">{{$message}}</p>
                @enderror
              </div>
            <div class="form-group mb-3">
              <label for="floatingInput">Name</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
              @error('name')
                  <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
              <label for="floatingPassword">Password</label>
              <input type="text" name="password" class="form-control">
              @error('password')
                  <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
              <input type="submit" value="register" class="w-100 btn btn-lg btn-dark btn-sm" >
            </div>
          </form>
          
        </main>
      </div>
    </div>
      
  </div>
@endsection