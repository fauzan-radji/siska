<div class="active" id="sidebar">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
      <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
          {{-- <a href="index.html"><img src="/mazer/images/logo/logo.svg" srcset="" alt="Logo"></a> --}}
          <a href="/dashboard" title="{{ auth()->user()->nama }}">
            <span class="d-flex align-items-center fs-5 gap-3">
              <img src="/mazer/images/logo/favicon.svg" alt="{{ auth()->user()->nama }}">
              {{ Illuminate\Support\Str::limit(strip_tags(auth()->user()->nama), 8) }}
            </span>
          </a>
        </div>
        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
          <svg class="iconify iconify--system-uicons" role="img" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
              <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
              <g transform="translate(-210 -1)">
                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                <circle cx="220.5" cy="11.5" r="4"></circle>
                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
              </g>
            </g>
          </svg>
          <div class="form-check form-switch fs-6">
            <input class="form-check-input  me-0" id="toggle-dark" type="checkbox">
            <label class="form-check-label"></label>
          </div>
          <svg class="iconify iconify--mdi" role="img" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
            <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
          </svg>
        </div>
        <div class="sidebar-toggler  x">
          <a class="sidebar-hide d-xl-none d-block" href="#"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
          <a class="sidebar-link" href="/dashboard">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        @can('viewAny', \App\Models\Admin::class)
          <li class="sidebar-item has-sub {{ Request::is('dashboard/admin', 'dashboard/admin/create') ? 'active' : '' }}">
            <a class="sidebar-link" href="#">
              <i class="bi bi-people-fill"></i>
              <span>Pengurus</span>
            </a>
            <ul class="submenu {{ Request::is('dashboard/admin', 'dashboard/admin/create') ? 'active' : '' }}">
              <li class="submenu-item {{ Request::is('dashboard/admin') ? 'active' : '' }}">
                <a href="/dashboard/admin">Daftar Pengurus</a>
              </li>
              @can('create', \App\Models\Admin::class)
                <li class="submenu-item {{ Request::is('dashboard/admin/create') ? 'active' : '' }}">
                  <a href="/dashboard/admin/create">Tambah Pengurus</a>
                </li>
              @endcan
            </ul>
          </li>
        @endcan

        <li class="sidebar-item has-sub {{ Request::is('dashboard/kwarran', 'dashboard/kwarran/*') ? 'active' : '' }}">
          <a class="sidebar-link" href="#">
            <i class="bi bi-geo-alt-fill"></i>
            <span>Kwartir Ranting</span>
          </a>
          <ul class="submenu {{ Request::is('dashboard/kwarran', 'dashboard/kwarran/*') ? 'active' : '' }}">
            <li class="submenu-item {{ Request::is('dashboard/kwarran') ? 'active' : '' }}">
              <a href="/dashboard/kwarran">Daftar Kwarran</a>
            </li>
            @can('create', \App\Models\Kwarran::class)
              <li class="submenu-item {{ Request::is('dashboard/kwarran/create') ? 'active' : '' }}">
                <a href="/dashboard/kwarran/create">Tambah Kwarran</a>
              </li>
            @endcan
          </ul>
        </li>

        @php
          $user = auth()->user();
          $isAdmin = false;
          $isPembina = false;
          $isPesertaDidik = false;
          if ($user->isAdmin()) {
              $user = $user->admin;
              $isAdmin = true;
          } elseif ($user->isPembina()) {
              $user = $user->pembina;
              $isPembina = true;
          } elseif ($user->isPesertaDidik()) {
              $user = $user->peserta_didik;
              $isPesertaDidik = true;
          }
          $id = $user->id;
        @endphp

        @can('viewAny', \App\Models\Pangkalan::class)
          <li class="sidebar-item has-sub {{ Request::is('dashboard/pangkalan', 'dashboard/pangkalan/create', 'dashboard/pangkalan/waitingroom', 'dashboard/pangkalan/' . $user->pangkalan_id) ? 'active' : '' }}">
            <a class="sidebar-link" href="#">
              <i class="bi bi-house-fill"></i>
              <span>Pangkalan</span>
            </a>
            <ul class="submenu {{ Request::is('dashboard/pangkalan', 'dashboard/pangkalan/create', 'dashboard/pangkalan/waitingroom', 'dashboard/pangkalan/' . $user->pangkalan_id) ? 'active' : '' }}">
              <li class="submenu-item {{ Request::is('dashboard/pangkalan') ? 'active' : '' }}">
                <a href="/dashboard/pangkalan">Daftar Pangkalan</a>
              </li>
              @can('create', \App\Models\Pangkalan::class)
                <li class="submenu-item {{ Request::is('dashboard/pangkalan/create') ? 'active' : '' }}">
                  <a href="/dashboard/pangkalan/create">Tambah Pangkalan</a>
                </li>
              @endcan
              @can('verifyAll', \App\Models\Pangkalan::class)
                <li class="submenu-item {{ Request::is('dashboard/pangkalan/waitingroom') ? 'active' : '' }}">
                  <a href="/dashboard/pangkalan/waitingroom">Ruang Tunggu</a>
                </li>
              @endcan
              @if (!$isAdmin)
                <li class="submenu-item {{ Request::is('dashboard/pangkalan/' . $user->pangkalan_id) ? 'active' : '' }}">
                  <a href="/dashboard/pangkalan/{{ $user->pangkalan_id }}">Pangkalan Saya</a>
                </li>
              @endif
            </ul>
          </li>
        @endcan

        @can('viewAny', \App\Models\Pembina::class)
          <li class="sidebar-item has-sub {{ Request::is('dashboard/pembina', 'dashboard/pembina/create') ? 'active' : '' }}">
            <a class="sidebar-link" href="#">
              <i class="bi bi-people-fill"></i>
              <span>Pembina</span>
            </a>
            <ul class="submenu {{ Request::is('dashboard/pembina', 'dashboard/pembina/create', 'dashboard/pembina/waitingroom') ? 'active' : '' }}">
              <li class="submenu-item {{ Request::is('dashboard/pembina') ? 'active' : '' }}">
                <a href="/dashboard/pembina">Daftar Pembina</a>
              </li>
              @can('create', \App\Models\Pembina::class)
                <li class="submenu-item {{ Request::is('dashboard/pembina/create') ? 'active' : '' }}">
                  <a href="/dashboard/pembina/create">Tambah Pembina</a>
                </li>
              @endcan
              @can('verifyAll', \App\Models\Pembina::class)
                <li class="submenu-item {{ Request::is('dashboard/pembina/waitingroom') ? 'active' : '' }}">
                  <a href="/dashboard/pembina/waitingroom">Ruang Tunggu</a>
                </li>
              @endcan
            </ul>
          </li>
        @endcan

        @can('viewAny', \App\Models\PesertaDidik::class)
          <li class="sidebar-item has-sub {{ Request::is('dashboard/peserta_didik', 'dashboard/peserta_didik/create') ? 'active' : '' }}">
            <a class="sidebar-link" href="#">
              <i class="bi bi-people-fill"></i>
              <span>Peserta Didik</span>
            </a>
            <ul class="submenu {{ Request::is('dashboard/peserta_didik', 'dashboard/peserta_didik/create', 'dashboard/peserta_didik/waitingroom') ? 'active' : '' }}">
              <li class="submenu-item {{ Request::is('dashboard/peserta_didik') ? 'active' : '' }}">
                <a href="/dashboard/peserta_didik">Daftar Peserta Didik</a>
              </li>
              @can('create', \App\Models\PesertaDidik::class)
                <li class="submenu-item {{ Request::is('dashboard/peserta_didik/create') ? 'active' : '' }}">
                  <a href="/dashboard/peserta_didik/create">Tambah Peserta Didik</a>
                </li>
              @endcan
              @can('verifyAll', \App\Models\PesertaDidik::class)
                <li class="submenu-item {{ Request::is('dashboard/peserta_didik/waitingroom') ? 'active' : '' }}">
                  <a href="/dashboard/peserta_didik/waitingroom">Ruang Tunggu</a>
                </li>
              @endcan
            </ul>
          </li>
        @endcan

        <li class="sidebar-item has-sub {{ Request::is('dashboard/admin/' . $id, 'dashboard/pembina/' . $id, 'dashboard/peserta_didik/' . $id) ? 'active' : '' }}">
          <a class='sidebar-link' href="#">
            <i class="bi bi-person-badge-fill"></i>
            <span>Profile</span>
          </a>
          <ul class="submenu {{ Request::is('dashboard/admin/' . $id, 'dashboard/pembina/' . $id, 'dashboard/peserta_didik/' . $id) ? 'active' : '' }}">
            @if ($isAdmin)
              <li class="submenu-item {{ Request::is('dashboard/admin/' . $id) ? 'active' : '' }}">
                <a href="/dashboard/admin/{{ $id }}">Akun Saya</a>
              </li>
            @elseif($isPembina)
              <li class="submenu-item {{ Request::is('dashboard/pembina/' . $id) ? 'active' : '' }}">
                <a href="/dashboard/pembina/{{ $id }}">Akun Saya</a>
              </li>
            @elseif($isPesertaDidik)
              <li class="submenu-item {{ Request::is('dashboard/peserta_didik/' . $id) ? 'active' : '' }}">
                <a href="/dashboard/peserta_didik/{{ $id }}">Akun Saya</a>
              </li>
            @endif
            <li class="submenu-item">
              <a>
                <form action="/logout" method="post">
                  @csrf
                  <button class="p-0 text-danger bg-transparent border-0" type="submit" style="color: inherit; font-weight: inherit;">Logout</button>
                </form>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
