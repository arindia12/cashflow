<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - CashFlow</title>

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

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fce4ec;
        }

        .login-card {
            width: 100%;
            max-width: 430px;

            border: none;
            border-radius: 10px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .login-content {
            padding: 40px;
        }

        .cashflow-logo {
            width: 65px;
            height: 65px;

            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #f8bbd0;

            border-radius: 50%;

            color: #c2185b;

            font-size: 30px;
        }

        .cashflow-title {
            color: #c2185b;
            font-weight: 700;
        }

        .admin-text {
            color: #858796;
            font-size: 14px;
        }

        .btn-login {
            background: #e91e63;
            border-color: #e91e63;
        }

        .btn-login:hover {
            background: #c2185b;
            border-color: #c2185b;
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="card login-card my-5">

                    <div class="login-content">

                        <!-- Logo -->
                        <div class="text-center">

                            <div class="cashflow-logo">

                                <i class="fas fa-wallet"></i>

                            </div>

                        </div>


                        <!-- Judul -->
                        <div class="text-center">

                            <h1 class="h4 cashflow-title mb-2">
                                CashFlow
                            </h1>

                            <p class="mb-1">
                                Akses hanya untuk Administrator
                            </p>

                            <p class="admin-text mb-4">
                                Silakan login untuk melanjutkan
                            </p>

                        </div>


                        <!-- Form Login -->
                        <form
                            method="POST"
                            action="{{ route('login') }}"
                            class="user">

                            @csrf


                            <!-- Email -->
                            <div class="form-group">

                                <input
                                    type="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                    required
                                    autofocus>

                                @error('email')

                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                            </div>


                            <!-- Password -->
                            <div class="form-group">

                                <input
                                    type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Password"
                                    required>

                                @error('password')

                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror

                            </div>


                            <!-- Remember Me -->
                            <div class="form-group">

                                <div class="custom-control custom-checkbox small">

                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        name="remember"
                                        id="remember">

                                    <label
                                        class="custom-control-label"
                                        for="remember">

                                        Remember Me

                                    </label>

                                </div>

                            </div>


                            <!-- Login -->
                            <button
                                type="submit"
                                class="btn btn-login btn-primary btn-user btn-block">

                                Login

                            </button>

                        </form>


                        <!-- Keterangan -->
                        <div class="text-center mt-3">

                            <small class="text-muted">
                                Gunakan akun yang telah disediakan.
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SB Admin 2 JS -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>