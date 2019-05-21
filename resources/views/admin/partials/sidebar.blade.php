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

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.user.index') }}">All Users</a>
                <a class="collapse-item" href="{{ route('admin.user.index') }}">Editor</a>
                <a class="collapse-item" href="{{ route('admin.user.index') }}">Member</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" disabled>
            <i class="fas fa-fw fa-envelope"></i>
            <span>Inbox</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item {{ str_contains(Route::currentRouteName(), 'admin.blog.') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.blog.index') }}">
            <i class="fas fa-fw fa-align-justify"></i>
            <span>Blogs</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-comments"></i>
            <span>Testimonies</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Site Settings</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addon
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fab fa-telegram-plane"></i>
            <span>Telegram Integrations</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fab fa-fw fa-facebook"></i>
            <span>Facebook Integrations</span>
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