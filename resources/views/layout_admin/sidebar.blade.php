<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Dashboard") ? 'active':'' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Data Film") ? 'active':'' }}" href="/dashboard/film">
            <span data-feather="file" class="align-text-bottom"></span>
            Film
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($title === "Data Genre") ? 'active':'' }}" href="/dashboard/genre">
            <span data-feather="file" class="align-text-bottom"></span>
            Genre
          </a>
        </li>
        
      </ul>

      
    </div>
  </nav>