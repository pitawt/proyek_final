<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
        <a class="navbar-brand" href="#">Pits.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active': '' }}" href="/">Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('genre') ? 'active': '' }}" href="/genre">Genre</a>
            </li>
            
        </ul>
        
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Halo {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                    <li><a class="dropdown-item" href="/genre">Genre</a></li>
                    <li><a class="dropdown-item" href="/film">Film</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i>Logout</button>
                        </form>
                    </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="/login" class="text-decoration-none nav-link {{ Request::is('login') ? 'active': '' }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                </li>
            @endauth
        </ul>
       
        
        </div>
    </div>
</nav>
