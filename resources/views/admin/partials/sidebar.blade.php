<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a href="{{ route('home') }}" target="_blank" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="http://surabayadev.test/themes/sbydev-default/img/logo-light.svg" style="width: 100%;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MAIN MENU
    </div>

    <!-- Example Dropdown -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.event.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.event.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Events</span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.user.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="javascript: void();" disabled>
            <i class="fas fa-fw fa-envelope"></i>
            <span>Inbox <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.category.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Categories <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.blog.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.blog.index') }}">
            <i class="fas fa-fw fa-align-justify"></i>
            <span>Blogs</span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.testimony.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.testimony.index') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Testimonies <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="javascript: void();">
            <i class="fas fa-fw fa-cog"></i>
            <span>Site Settings <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addon
    </div>

    <li class="nav-item">
        <a class="nav-link" href="javascript: void();">
            <i class="fab fa-telegram-plane"></i>
            <span>Telegram <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="javascript: void();">
            <i class="fab fa-fw fa-facebook"></i>
            <span>Facebook <small class="badge badge-default">(soon)</small></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->