<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <!-- Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('admin.home') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-wallet"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            CashFlow
        </div>

    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.home') }}">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>

        </a>

    </li>

    <hr class="sidebar-divider">

    <!-- Menu -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Transaksi -->
    <li class="nav-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.transactions.index') }}">

            <i class="fas fa-fw fa-exchange-alt"></i>

            <span>Transaksi</span>

        </a>

    </li>

    <!-- Kategori -->
    <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.categories.index') }}">

            <i class="fas fa-fw fa-tags"></i>

            <span>Kategori</span>

        </a>

    </li>

    <!-- Profil -->
    <li class="nav-item {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.profile.index') }}">

            <i class="fas fa-fw fa-user"></i>

            <span>Profil</span>

        </a>

    </li>

    <hr class="sidebar-divider">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <div class="sidebar-spacer"></div>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>