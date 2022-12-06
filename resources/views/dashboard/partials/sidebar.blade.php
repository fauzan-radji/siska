<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-current="page">
          <span class="align-text-bottom" data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/kwarran*') ? 'active' : '' }}" href="/dashboard/kwarran">
          <span class="align-text-bottom" data-feather="map-pin"></span>
          Kwartir Ranting
        </a>
      </li>

      @can('viewAny', \App\Models\Pangkalan::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pangkalan') ? 'active' : '' }}" href="/dashboard/pangkalan">
            <span class="align-text-bottom" data-feather="home"></span>
            Pangkalan
          </a>
        </li>
      @endcan
      @if (!auth()->user()->isAdmin())
        <li class="nav-item">
          @if (auth()->user()->isPembina())
            <a class="nav-link {{ Request::is('dashboard/pangkalan/' . auth()->user()->pembina->pangkalan_id) ? 'active' : '' }}" href="/dashboard/pangkalan/{{ auth()->user()->pembina->pangkalan_id }}">
              <span class="align-text-bottom" data-feather="home"></span>
              Pangkalan Saya
            </a>
          @else
            <a class="nav-link {{ Request::is('dashboard/pangkalan/' . auth()->user()->peserta_didik->pangkalan_id) ? 'active' : '' }}" href="/dashboard/pangkalan/{{ auth()->user()->peserta_didik->pangkalan_id }}">
              <span class="align-text-bottom" data-feather="home"></span>
              Pangkalan Saya
            </a>
          @endif
        </li>
      @endif

      @can('viewAny', \App\Models\Pembina::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pembina*') ? 'active' : '' }}" href="/dashboard/pembina">
            <span class="align-text-bottom" data-feather="users"></span>
            Pembina
          </a>
        </li>
      @endcan

      @can('viewAny', \App\Models\PesertaDidik::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/peserta_didik*') ? 'active' : '' }}" href="/dashboard/peserta_didik">
            <span class="align-text-bottom" data-feather="users"></span>
            Peserta Didik
          </a>
        </li>
      @endcan

      @can('viewAny', \App\Models\Poin::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/poin') ? 'active' : '' }}" href="/dashboard/poin">
            <span class="align-text-bottom" data-feather="book-open"></span>
            Syarat Kecakapan Umum
          </a>
        </li>
      @endcan

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/jadwal*') ? 'active' : '' }}" href="/dashboard/jadwal">
          <span class="align-text-bottom" data-feather="calendar"></span>
          Jadwal
        </a>
      </li>

      @can('viewAny', \App\Models\Admin::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}" href="/dashboard/admin">
            <span class="align-text-bottom" data-feather="users"></span>
            Pengurus
          </a>
        </li>
      @endcan

      <li class="nav-item">
        @if (auth()->user()->isAdmin())
          <a class="nav-link {{ Request::is('dashboard/admin/' . auth()->user()->admin->id) ? 'active' : '' }}" href="/dashboard/admin/{{ auth()->user()->admin->id }}">
            <span class="align-text-bottom" data-feather="user"></span>
            Akun Saya
          </a>
        @elseif(auth()->user()->isPembina())
          <a class="nav-link {{ Request::is('dashboard/pembina/' . auth()->user()->pembina->id) ? 'active' : '' }}" href="/dashboard/pembina/{{ auth()->user()->pembina->id }}">
            <span class="align-text-bottom" data-feather="user"></span>
            Akun Saya
          </a>
        @elseif(auth()->user()->isPesertaDidik())
          <a class="nav-link {{ Request::is('dashboard/peserta_didik/' . auth()->user()->peserta_didik->id) ? 'active' : '' }}" href="/dashboard/peserta_didik/{{ auth()->user()->peserta_didik->id }}">
            <span class="align-text-bottom" data-feather="user"></span>
            Akun Saya
          </a>
        @endif
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">Ruang Tunggu</h6>
    <ul class="nav flex-column mb-2">
      @can('verifyAny', \App\Models\Pangkalan::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pangkalan/waitingroom') ? 'active' : '' }}" href="/dashboard/pangkalan/waitingroom">
            <span class="align-text-bottom" data-feather="home"></span>
            Pangkalan
          </a>
        </li>
      @endcan
      @can('verifyAny', \App\Models\Pembina::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pembina/waitingroom') ? 'active' : '' }}" href="/dashboard/pembina/waitingroom">
            <span class="align-text-bottom" data-feather="users"></span>
            Pembina
          </a>
        </li>
      @endcan
      @can('verifyAny', \App\Models\PesertaDidik::class)
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/peserta_didik/waitingroom') ? 'active' : '' }}" href="/dashboard/peserta_didik/waitingroom">
            <span class="align-text-bottom" data-feather="users"></span>
            Peserta Didik
          </a>
        </li>
      @endcan
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
