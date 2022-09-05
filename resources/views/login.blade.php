@extends('layout.main')

@section('container')
  <div class="container">
    
    <div class="row justify-content-center">
      <div class="col-md-4">
        @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>   
        @endif

        @if (session()->has('loginError'))
          <div class="alert alert-danger" role="alert">
            {{ session('loginError') }}
          </div>   
        @endif
        <h1 class="h3 mb-3 fw-normal text-center">Form Login</h1>
        <main class="form-signin">
          <form action="/login" method="post">
            @csrf
            <div class="form-group mb-3">
              <label>Email address</label>
              <input type="text" name="email" class="form-control" autofocus>
              @error('email')
                  <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" autofocus>
              @error('password')
                  <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
              <button class="w-100 btn btn-lg btn-dark btn-sm" type="submit">sign in</button>
            </div>
          </form>
          <small class="d-block text-center mt-3">Not Registered ? <a href="/register">register here</a> </small>
        </main>
      </div>
    </div>
      
  </div>
    
      
@endsection