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

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">

                        <div class="row">

                            <div class="col-12">

                                <div class="p-5">

                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">
                                            CashFlow
                                        </h1>

                                        <p class="mb-4">
                                            Silakan login untuk melanjutkan
                                        </p>

                                    </div>

                                    <form
                                        method="POST"
                                        action="{{ route('login') }}"
                                        class="user">

                                        @csrf

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


                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-user btn-block">

                                            Login

                                        </button>

                                    </form>

                                </div>

                            </div>

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