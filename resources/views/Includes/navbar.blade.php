<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"
          ><i class="fas fa-bars"></i
        ></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
        {{-- settings --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-circle"></i>
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
          <div class="dropdown-divider"></div>
          <a href="{{route('account.edit', Auth::user()->id)}}" class="text-center dropdown-item">
            <i class="fas fa-user-cog"></i> Setting
            {{-- <span class="float-right text-sm text-muted">2 days</span> --}}
          </a>
          <div class="dropdown-divider"></div>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                @method('POST')
                <button href="#" class="dropdown-item dropdown-footer">Sign Out</button>
            </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          data-widget="control-sidebar"
          data-slide="true"
          href="#"
          role="button"
        >
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
</nav>
