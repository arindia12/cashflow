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
            min-height: 100vh;
            margin: 0;

            background: #fff5f9;
        }

        .welcome-container {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-content {
            text-align: center;
            max-width: 650px;
            padding: 40px 25px;
        }

        .cashflow-logo {
            width: 85px;
            height: 85px;

            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e83e8c;
            color: white;

            border-radius: 50%;

            font-size: 38px;
        }

        .welcome-small {
            color: #666;
            font-size: 18px;

            margin-bottom: 5px;
        }

        .welcome-title {
            color: #e83e8c;

            font-size: 52px;
            font-weight: 800;

            margin-bottom: 20px;
        }

        .welcome-description {
            color: #777;

            font-size: 16px;
            line-height: 1.8;

            margin-bottom: 35px;
        }

        .btn-login {
            background: #e83e8c;
            border-color: #e83e8c;

            color: white;

            padding: 14px 60px;

            border-radius: 30px;

            font-weight: 700;
            font-size: 16px;
        }

        .btn-login:hover {
            background: #d63384;
            border-color: #d63384;
            color: white;
        }

    </style>

</head>

<body>

    <div class="welcome-container">

        <div class="welcome-content">

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

    </div>

</body>

</html>