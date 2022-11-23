<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-current="page">
          <span class="align-text-bottom" data-feather="home"></span>
          Dashboard
        </a>
      </li>
      {{-- if admin --}}
      @if (auth()->user()->admin)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kwarran*') ? 'active' : '' }}" href="/dashboard/kwarran">
            <span class="align-text-bottom" data-feather="map-pin"></span>
            Kwartir Ranting
          </a>
        </li>
      @endif

      {{-- if not peserta_didik --}}
      @if (!auth()->user()->peserta_didik)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pangkalan*') ? 'active' : '' }}" href="/dashboard/pangkalan">
            <span class="align-text-bottom" data-feather="home"></span>
            Pangkalan
          </a>
        </li>
      @endif

      {{-- if pembina --}}
      @if (auth()->user()->pembina)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pembina') ? 'active' : '' }}" href="/dashboard/pembina">
            <span class="align-text-bottom" data-feather="users"></span>
            Pembina
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/peserta_didik') ? 'active' : '' }}" href="/dashboard/peserta_didik">
            <span class="align-text-bottom" data-feather="users"></span>
            Peserta Didik
          </a>
        </li>
      @endif

      {{-- if not admin --}}
      @if (!auth()->user()->admin)
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="align-text-bottom" data-feather="book-open"></span>
            Syarat Kecakapan Umum
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="align-text-bottom" data-feather="calendar"></span>
            Jadwal
          </a>
        </li>
      @endif

      {{-- if admin --}}
      @if (auth()->user()->admin)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}" href="/dashboard/admin">
            <span class="align-text-bottom" data-feather="users"></span>
            Pengurus
          </a>
        </li>
      @endif

      <li class="nav-item">
        @php
          switch (true) {
              case auth()->user()->admin:
                  $id = auth()->user()->admin->id;
                  $route = 'admin';
                  break;
          
              case auth()->user()->pembina:
                  $id = auth()->user()->pembina->id;
                  $route = 'pembina';
                  break;
          
              case auth()->user()->peserta_didik:
                  $id = auth()->user()->peserta_didik->id;
                  $route = 'peserta_didik';
                  break;
          
              default:
                  $route = '..';
                  break;
          }
        @endphp
        <a class="nav-link {{ Request::is('dashboard/' . $route . '/' . $id) ? 'active' : '' }}" href="/dashboard/{{ $route }}/{{ $id }}">
          <span class="align-text-bottom" data-feather="user"></span>
          Akun Saya
        </a>
      </li>
    </ul>

    {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
      <span>Saved reports</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle" class="align-text-bottom"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Last quarter
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Year-end sale
        </a>
      </li>
    </ul> --}}
  </div>
</nav>
