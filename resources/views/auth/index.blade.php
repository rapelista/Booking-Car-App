<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta
            content="IE=edge"
            http-equiv="X-UA-Compatible"
        >
        <meta
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
            name="viewport"
        >
        <meta
            content=""
            name="description"
        >
        <meta
            content=""
            name="author"
        >

        <title>{{ config('app.name') }} - Login</title>

        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css"
        >
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        >

        <!-- Custom styles for this template-->
        <link
            href="{{ asset('css/sb-admin-2.min.css') }}"
            rel="stylesheet"
        >

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-5 col-md-6">

                    <div
                        class="card @if (session()->has('error') or $errors->any()) border-left-danger @else border-left-light @endif shadow my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        @if (session()->has('error'))
                                            <div class="card bg-danger text-white mb-3">
                                                <div class="card-body">
                                                    {{ session()->get('error') }}
                                                </div>
                                            </div>
                                        @endif
                                        <form
                                            class="user"
                                            method="POST"
                                        >
                                            @csrf
                                            <div class="form-group">
                                                <input
                                                    class="form-control form-control-user @if ($errors->any()) is-invalid @endif"
                                                    id="inputUsername"
                                                    name="username"
                                                    placeholder="Username"
                                                    required
                                                    type="text"
                                                    value="{{ old('username') }}"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <input
                                                    @if ($errors->any()) autofocus @endif
                                                    class="form-control form-control-user @if ($errors->any()) is-invalid focused @endif"
                                                    id="inputPassword"
                                                    name="password"
                                                    placeholder="Password"
                                                    required
                                                    type="password"
                                                >
                                            </div>
                                            <button
                                                class="btn btn-primary btn-user btn-block"
                                                type="submit"
                                            >
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

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    </body>

</html>
