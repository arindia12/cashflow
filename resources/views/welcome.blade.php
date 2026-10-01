<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CashFlow</title>

    <!-- Font Awesome -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet">

    <style>

        body {
            margin: 0;

            font-family: 'Nunito', sans-serif;
            color: #3d3d3d;
        }

        /* Navbar di atas hero */
        .navbar-landing {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 18px 32px;
            position: relative;
            z-index: 2;
        }

        .navbar-landing .brand {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .btn-cf-white {
            background: #fff;
            color: #c2185b;
            border: none;
 
            padding: 8px 22px;
            border-radius: 6px;
 
            font-weight: 600;
            font-size: 0.9rem;
 
            text-decoration: none;
            display: inline-block;
        }

        .btn-cf-white:hover {
            background: #fdeef4;
            color: #c2185b;
            text-decoration: none;
        }

        /* Hero */
        .hero {
            position: relative;
 
            background: linear-gradient(160deg, #4b1528 0%, #993556 55%, #d4537e 100%);
            padding-bottom: 70px;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            padding: 60px 20px 50px;
            position: relative;
            z-index: 1;
        }

        .cashflow-logo {
            width: 85px;
            height: 85px;
 
            margin: 0 auto 20px;
 
            display: flex;
            align-items: center;
            justify-content: center;
 
            background: rgba(255,255,255,0.15);
            color: white;
 
            border-radius: 50%;
 
            font-size: 38px;
        }

        .welcome-small {
            color: #f4c0d1;
            font-size: 14px;
            letter-spacing: 0.06em;
            font-weight: 600;
 
            margin-bottom: 12px;
        }

        .welcome-title {
            color: #fff;
 
            font-size: 3rem;
            font-weight: 800;
 
            margin-bottom: 16px;
        }
 
        .welcome-description {
            color: #fbeaf0;
 
            font-size: 16px;
            line-height: 1.8;
 
            max-width: 480px;
            margin: 0 auto 30px;
        }

        .btn-login {
            background: #fff;
            border-color: #fff;
 
            color: #c2185b;
 
            padding: 14px 48px;
 
            border-radius: 30px;
 
            font-weight: 700;
            font-size: 16px;
        }
 
        .btn-login:hover {
            background: #fdeef4;
            border-color: #fdeef4;
            color: #c2185b;
        }

        .hero-wave {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
 
            display: block;
            line-height: 0;
        }

        /* Section fitur */
        .feature-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 40px;
 
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 24px;
        }
 
        .feature-text {
            flex: 1 1 380px;
        }

        .feature-text h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3d3d3d;
 
            margin-bottom: 14px;
        }
 
        .feature-text p {
            color: #767676;
            font-size: 0.95rem;
            line-height: 1.7;
 
            margin-bottom: 18px;
        }
 
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
 
            font-size: 0.92rem;
            color: #555;
 
            margin-bottom: 10px;
        }
 
        .feature-list i {
            color: #d4537e;
        }
 
        .feature-preview {
            flex: 1 1 340px;
 
            background: #fdf4f8;
            border-radius: 14px;
            padding: 20px;
        }

        .mini-cards {
            display: flex;
            gap: 10px;
 
            margin-bottom: 12px;
        }
 
        .mini-card {
            flex: 1;
 
            background: #fff;
            border: 1px solid #f0e2e9;
            border-radius: 8px;
            padding: 10px 12px;
        }
 
        .mini-card .label {
            font-size: 0.7rem;
            color: #999;
        }

        .mini-card .value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #3d3d3d;
        }
 
        .mini-card .value.in {
            color: #1e9e4c;
        }
 
        .mini-chart {
            background: #fff;
            border: 1px solid #f0e2e9;
            border-radius: 8px;
            padding: 14px;
 
            display: flex;
            align-items: flex-end;
            gap: 8px;
 
            height: 90px;
        }
 
        .mini-chart .bar {
            flex: 1;

            background: #f4c0d1;
            border-radius: 3px;
        }
 
        .mini-chart .bar.active {
            background: #ec4899;
        }
 
        /* CTA penutup */
        .cta-section {
            max-width: 1000px;
            margin: 0 auto 60px;
            padding: 0 24px;
        }
 
        .cta-box {
            background: #c2185b;
            border-radius: 14px;
 
            text-align: center;
            padding: 44px 24px;
        }

        .cta-box h3 {
            color: #fff;
            font-size: 1.4rem;
            font-weight: 700;
 
            margin-bottom: 8px;
        }
 
        .cta-box p {
            color: #f4c0d1;
            font-size: 0.92rem;
 
            margin-bottom: 22px;
        }

        /* Footer */
        .landing-footer {
            text-align: center;
            padding: 20px;
 
            font-size: 0.85rem;
            color: #999;
 
            border-top: 1px solid #eee;
        }
 
        @media (max-width: 576px) {
            .welcome-title {
                font-size: 2.2rem;
            }
        }

    </style>

</head>

<body>

    <div class="hero">

        <!-- Navbar -->
        <nav class="navbar-landing">
 
            <div class="brand">
                <i class="fas fa-wallet"></i> CashFlow
            </div>
 
            <a
                href="{{ route('login') }}"
                class="btn-cf-white">
                Login
            </a>
 
        </nav>

        <div class="hero-content">

            <!-- Logo -->
            <div class="cashflow-logo">

                <i class="fas fa-wallet"></i>

            </div>


            <!-- Nama Aplikasi -->
            <div class="welcome-small">
                Sistem Pencatatan Keuangan
            </div>

            <h1 class="welcome-title">
                CashFlow
            </h1>


            <!-- Deskripsi -->
            <p class="welcome-description">
                Kelola dan catat pemasukan serta pengeluaran
                dengan lebih mudah dan teratur.
                <br>
                Sistem ini digunakan oleh Administrator
                untuk mengelola data keuangan.
            </p>


            <!-- Tombol Login -->
            <a
                href="{{ route('login') }}"
                class="btn btn-login">

                <i class="fas fa-sign-in-alt mr-2"></i>
                LOGIN

            </a>

        </div>

        <!-- Wave divider -->
        <svg
            class="hero-wave"
            viewBox="0 0 1000 60"
            preserveAspectRatio="none"
            style="height: 60px;">
 
            <path d="M0,30 C250,60 750,0 1000,30 L1000,60 L0,60 Z" fill="#ffffff"></path>
 
        </svg>
 
    </div>

    <!-- Section fitur -->
    <div class="feature-section">
 
        <div class="feature-text">
 
            <h2>Kelola keuangan tanpa ribet</h2>
 
            <p>
                Semua transaksi dan kategori tercatat rapi, saldo dan grafik
                bulanan langsung terlihat di dashboard.
            </p>
 
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Catat transaksi pemasukan &amp; pengeluaran</li>
                <li><i class="fas fa-check"></i> Kelola kategori sesuai kebutuhan</li>
                <li><i class="fas fa-check"></i> Pantau saldo &amp; grafik 6 bulan terakhir</li>
            </ul>
 
        </div>

        <div class="feature-preview">

            <div class="mini-card">

                <div class="mini-card">
                   <div class="label">Saldo</div>
                   <div class="value">Rp 11.000</div>
                </div>

                <div class="mini-card">
                   <div class="label">Pemasukan</div>
                   <div class="value">Rp 13.000</div>
                </div>

            </div>

            <div class="mini-chart">
                <div class="bar" style="height:40%"></div>
                <div class="bar" style="height:65%"></div>
                <div class="bar" style="height:30%"></div>
                <div class="bar active" style="height:80%"></div>
                <div class="bar" style="height:50%"></div>
            </div>
        </div>

    </div>

    <!-- CTA penutup -->
    <div class="cta-section">
 
        <div class="cta-box">
 
            <h3>Siap kelola keuangan Anda?</h3>
 
            <p>Masuk dan mulai catat transaksi hari ini juga.</p>
 
            <a
                href="{{ route('login') }}"
                class="btn-cf-white">
                Login
            </a>
 
        </div>

    </div>

    <!-- Footer -->
    <footer class="landing-footer">
        CashFlow &copy; {{ date('Y') }}
    </footer>

</body>

</html>