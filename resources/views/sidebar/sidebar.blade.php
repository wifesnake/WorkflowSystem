<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if ($is_admin == '1')
      <a href="{{ url('admin/home') }}" class="brand-link">
    @else
      <a href="{{ url('/') }}" class="brand-link">  
    @endif
      <img src="{{ asset('storage/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">System  Miler</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/images/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ($menus as $menu)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon {{ $menu->icon }}"></i>
              <p>
                {{ $menu->name }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @foreach ($submenus as $submenu)
                @if ($menu->id == $submenu->menu_id)
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chevron-right"></i>
                        <p>{{ $submenu->name }}</p>
                      </a>
                    </li>
                  </ul>
                @endif
            @endforeach
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul> --}}
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>