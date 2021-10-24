<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="#">
        <div class="sidebar-brand-text mx-3">Menu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('surat.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Arsip</span>
        </a>
    </li>
    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>About</span>
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
