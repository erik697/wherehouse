<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-headphones"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Wherehouse AV</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Manage Wherehouse -->
    <li class="nav-item {{ request()->is('manage-wherehouse') || request()->is('manage-wherehouse/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('manageWherehouse.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Manage Wherehouse</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ request()->is('products') || request()->is('products/*') || request()->is('wherehouses') || request()->is('wherehouses/*') ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse {{ request()->is('products') || request()->is('products/*') || request()->is('wherehouses') || request()->is('wherehouses/*') ? 'show' : '' }} " aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('products') || request()->is('products/*') ? 'bg-light' : '' }}" href="{{ route('products.index') }}">Products</a>
                <a class="collapse-item {{ request()->is('wherehouses') || request()->is('wherehouses/*') ? 'bg-light' : '' }}" href="{{ route('wherehouses.index') }}">Wherehouse</a>
            </div>
        </div>
    </li>

     <!-- Heading -->
     <div class="sidebar-heading">
        User
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>