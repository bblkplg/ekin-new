<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ekinerja</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }} <br> {{ Auth::user()->jabatan }} <br> {{ Auth::user()->instalasi }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('target.index')}}" class="nav-link {{ request()->is('target') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Target
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kegiatan.index')}}" class="nav-link {{ request()->is('kegiatan') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('hitung')}}" class="nav-link  {{ request()->is('hasil') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Hasil
              </p>
            </a>
          </li>
          @if (Auth::user()->jabatan == 'Kasie' || Auth::user()->jabatan == 'Kepala Instalasi' || Auth::user()->jabatan == 'Kabid' || Auth::user()->jabatan == 'Kepala BBLK' || Auth::user()->jabatan == 'Kabag')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Validasi Pegawai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('validasikegiatan')}}" class="nav-link  {{ request()->is('validasi-kegiatan') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Validasi Kegiatan Pegawai</p>
                  </a>
                </li>

              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('validasi')}}" class="nav-link  {{ request()->is('validasi') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validasi Hasil Pegawai</p>
                </a>
              </li>

            </ul>
          </li>
          @endif

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->nama == 'Muhammad Fikri,S.Kom')
              <li class="nav-item">
                <a href="{{ route('datapegawai.index')}}" class="nav-link  {{ request()->is('datapegawai') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('indikator.index')}}" class="nav-link  {{ request()->is('indikator') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Indikator</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link  {{ Request::routeIs('logout.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
                </a>
            </li>
            </ul>
        </li>
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
