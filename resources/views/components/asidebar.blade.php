<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
  <img
      src="{{asset('assets/dist/img/logo-POJ.png')}}"
      alt="PT Pesonna Optima Jasa"
      style="opacity: .8; width: 150px;margin-left: 15px;">
    <span class="brand-text font-weight-light"></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="padding-left: 55px;">
      <div class="image">
        <img src="/{{ Auth::user()->upload_data}}" class="img-circle elevation-2" style="width: 80px; height: 80px;">
      </div>
    </div>
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <p style="padding-left: 50px"> {{ Auth::user()->name }}</p>
      <hr/>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('struktur.diagram') }}" class="nav-link {{ (request()->is('admin/diagram-strukturs*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Diagram Struktur
            </p>
          </a>
        </li>
        <li class="nav-item {{ ((request()->is('admin/nodin*'))||(request()->is('admin/memo*'))||(request()->is('admin/surat*'))) ? 'menu-is-opening menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Surat
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('nodin.index') }}" class="nav-link {{ (request()->is('admin/nodin*')) ? 'active' : '' }}">
                <i class="nav-icon ion ion-briefcase"></i>
                <p>Nota Dinas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('memo.index')}}" class="nav-link {{ (request()->is('admin/memo*')) ? 'active' : '' }}">
                <i class="nav-icon ion ion-document-text"></i>
                <p>Memorandum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('suratmasuk.index')}}" class="nav-link {{ (request()->is('admin/surat*')) ? 'active' : '' }}">
                <i class="nav-icon ion ion-clipboard"></i>
                <p>Surat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon ion ion-clipboard"></i>
                <p>Surat Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ ((request()->is('admin/users*'))||(request()->is('admin/roles*'))||(request()->is('admin/strukturs*'))||(request()->is('admin/diagram-struktur*'))) ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-gear-b"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/users*'))?'active' : '' }}">
                  <i class="nav-icon ion ion-person-stalker"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('admin/roles*')) ? 'active' : '' }}" >
                  <i class="nav-icon ion ion-settings"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('struktur.index') }}" class="nav-link {{ (request()->is('admin/strukturs*')) ? 'active' : '' }}">
                  <i class="nav-icon ion ion-stats-bars"></i>
                  <p>Struktur</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}" class="nav-link">
                  <i class="nav-icon ion ion-unlocked"></i>
                  <p class="text">Logout</p>
              </a>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
