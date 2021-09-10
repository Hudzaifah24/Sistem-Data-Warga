<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img
        src="/AdminLTE-3.1.0/dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">Data Warga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
          <img
            src="/AdminLTE-3.1.0/dist/img/user2-160x160.jpg"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
            <a href="#" class="d-block">
            @if (Auth::user()->role=='SUPERADMIN')
                Super Admin
            @elseif (Auth::user()->role=='ADMIN')
                Admin
            @elseif (Auth::user()->role=='WATCHER')
                Watcher
            @endif
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-header">DASHBOARD</li>
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('/'))? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">PAGES</li>

          {{-- Master --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is(['dusun*', 'penduduk*', 'kartukeluarga*']))? 'active':'' }}">
              <i class="nav-icon fas fa-dice-d20"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dusun.index') }}" class="nav-link {{ (request()->is('dusun*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dusun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('penduduk.index') }}" class="nav-link {{ (request()->is('penduduk*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penduduk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kartukeluarga.index') }}" class="nav-link {{ (request()->is('kartukeluarga*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Keluarga</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Kematian --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('kematian*'))? 'active':'' }}">
              <i class="nav-icon fas fa-dice-d20"></i>
              <p>
                Kematian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kematian.index') }}" class="nav-link {{ (request()->is('kematian*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kematian</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Kelahiran --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('kelahiran*'))? 'active':'' }}">
              <i class="nav-icon fas fa-dice-d20"></i>
              <p>
                Kelahiran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kelahiran.index') }}" class="nav-link {{ (request()->is('kelahiran*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelahiran</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Mutasi --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ (request()->is('mutasi*'))? 'active':'' }}">
              <i class="nav-icon fas fa-dice-d20"></i>
              <p>
                Mutasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('mutasi.index') }}" class="nav-link {{ (request()->is('mutasi*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mutasi</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- User --}}
          <li class="nav-item" style="display: {{Auth::user()->role!='SUPERADMIN'?'none':''}}">
            <a href="#" class="nav-link {{ (request()->is('user*'))? 'active':'' }}">
              <i class="nav-icon fas fa-dice-d20"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('user*'))? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
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
