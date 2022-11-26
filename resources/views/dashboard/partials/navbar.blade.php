<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Kwarcab Kota Gorontalo</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" type="button" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" aria-label="Search" placeholder="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button class="nav-link px-3 bg-transparent border-0" type="submit">
          Logout <span data-feather="log-out"></span>
        </button>
      </form>
    </div>
  </div>
</header>
