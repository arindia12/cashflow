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

    <!-- Custom Sidebar & Theme -->
    <style>
        #accordionSidebar {
            min-height: 100vh;
        }

        .sidebar-spacer {
            flex: 1;
        }

        /* ============ CashFlow pink theme (global) ============ */
        #content-wrapper, body { background-color: #fdf4f8 !important; }

        .cf-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 14px rgba(0,0,0,0.06);
        }
        .cf-card .card-header {
            background: #fff;
            border-bottom: 1px solid #f5e3ec;
            border-radius: 16px 16px 0 0;
            font-weight: 600;
        }
        .cf-card .card-footer {
            background: #fff;
            border-top: 1px solid #f5e3ec;
            border-radius: 0 0 16px 16px;
        }

        .btn-cf-pink { background-color: #ec4899; border-color: #ec4899; color: #fff; }
        .btn-cf-pink:hover, .btn-cf-pink:focus { background-color: #c2185b; border-color: #c2185b; color: #fff; }

        .btn-cf-outline { border: 1px solid #ec4899; color: #ec4899; background: #fff; }
        .btn-cf-outline:hover, .btn-cf-outline:focus { background: #fdeef4; color: #c2185b; }

        .form-control:focus, .form-select:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 0.2rem rgba(236,72,153,.15);
        }

        .cf-badge-in  { background: #e6f6ea; color: #1e9e4c; padding: 2px 10px; border-radius: 6px; font-size: .78rem; }
        .cf-badge-out { background: #fdeaea; color: #d64545; padding: 2px 10px; border-radius: 6px; font-size: .78rem; }

        .cf-avatar {
            width: 90px; height: 90px; border-radius: 50%;
            background: #fdeef4; display: flex; align-items: center; justify-content: center;
            font-size: 2.2rem; color: #ec4899; margin: 0 auto 16px;
        }

        .cf-card table thead th { color: #888; font-weight: 600; border-top: none; }
        .cf-stat-icon { margin-right: 16px; flex-shrink: 0; }

        /* ============ Sidebar recolor (ganti biru default SB Admin 2) ============ */
        .sidebar.bg-gradient-primary {
            background: #FB607F !important;
        }
        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,.85);
        }
        .sidebar .nav-item .nav-link:hover,
        .sidebar .nav-item .nav-link:focus {
            color: #fff;
        }
        .sidebar .nav-item.active .nav-link {
            color: #fff;
            font-weight: 700;
        }
        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255,255,255,.25);
        }
        .sidebar .sidebar-heading {
            color: rgba(255,255,255,.65);
        }
        .sidebar-brand-text {
            color: #fff;
        }
        .sidebar #sidebarToggle {
            background-color: rgba(255,255,255,.2);
        }
        .sidebar #sidebarToggle::after {
            color: #fff;
        }
    </style>

    @stack('styles')

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.inc.sidebar')
        <!-- End Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                @include('layouts.inc.navbar')
                <!-- End Topbar -->


                <!-- Main Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>


            <!-- Footer -->
            @include('layouts.inc.footer')
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