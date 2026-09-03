<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CashFlow') }}</title>

    <!-- Custom fonts -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
        type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet">

    @stack('styles')

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar">

            <!-- Brand -->
            <a
                class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('home') }}">

                <div class="sidebar-brand-icon">
                    <i class="fas fa-wallet"></i>
                </div>

                <div class="sidebar-brand-text mx-3">
                    CashFlow
                </div>

            </a>

            <hr class="sidebar-divider my-0">

            <!-- Dashboard -->
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">

                <a class="nav-link" href="{{ route('home') }}">

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
            <li class="nav-item">

                <a class="nav-link" href="{{ route('transactions.index') }}">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Transaksi</span>
                </a>

            </li>

            <!-- Kategori -->
            <li class="nav-item">

                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Kategori</span>
                </a>

            </li>

            <!-- Profil -->
            <li class="nav-item">

                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>

            </li>

            <hr class="sidebar-divider">

            <!-- Logout -->
            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>

                </a>

                <form
                    id="logout-form"
                    action="{{ route('logout') }}"
                    method="POST"
                    class="d-none">

                    @csrf

                </form>

            </li>

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">

                <button
                    class="rounded-circle border-0"
                    id="sidebarToggle">
                </button>

            </div>

        </ul>
        <!-- End Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle -->
                    <button
                        id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3">

                        <i class="fa fa-bars"></i>

                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- User -->
                        <li class="nav-item dropdown no-arrow">

                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="userDropdown"
                                role="button"
                                data-toggle="dropdown">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name ?? ''}}
                                </span>

                                <i class="fas fa-user-circle fa-lg"></i>

                            </a>

                            <div
                                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>

                                <div class="dropdown-divider"></div>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout

                                </a>

                            </div>

                        </li>

                    </ul>

                </nav>
                <!-- End Topbar -->


                <!-- Main Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">

                <div class="container my-auto">

                    <div class="copyright text-center my-auto">

                        <span>CashFlow &copy; {{ date('Y') }}</span>

                    </div>

                </div>

            </footer>
            <!-- End Footer -->

        </div>
        <!-- End Content Wrapper -->

    </div>

    <!-- Scroll to Top -->
    <a
        class="scroll-to-top rounded"
        href="#page-top">

        <i class="fas fa-angle-up"></i>

    </a>


       <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jQuery Easing -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')

</body>
</html>