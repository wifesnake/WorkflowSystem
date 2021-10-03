<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if ($is_admin == '1')
      <a href="{{ url('admin/home') }}" class="brand-link">
    @else
      <a href="{{ url('/') }}" class="brand-link">
    @endif
      <img src="{{ asset('storage/images/WCLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">วิเชียรทรานสปอร์ต</span>
    </a>
    <?php echo url()->full(); ?>
    {{-- <?php echo url(); ?> --}}
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ($menus as $menu)

            @if (url($menu->link) == url()->full())
                <li class="nav-item menu-is-opening menu-open">
            @else
                <li class="nav-item">
            @endif

            @if ($menu->link !== NULL)
                <a href="{{ url($menu->link) }}" class="nav-link">
            @else
                <a href="#" class="nav-link">
            @endif
              <i class="nav-icon {{ $menu->icon }}"></i>
              <p>
                {{ $menu->name }}
                @if ($menu->is_menu)
                  <i class="right fas fa-angle-left"></i>
                @endif
              </p>
            </a>
            @foreach ($submenus as $submenu)
                @if ($menu->id == $submenu->menu_id)
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ $submenu->link }}" class="nav-link">
                        <i class="nav-icon fas fa-chevron-right"></i>
                        <p>{{ $submenu->name }}</p>
                      </a>
                    </li>
                  </ul>
                @endif
            @endforeach
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
