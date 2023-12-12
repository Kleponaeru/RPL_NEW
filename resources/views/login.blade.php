<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LUNA | Sign In</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="{{ asset('style_dash.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body style="background-image: url{{ asset('images/luna-icon.svg') }}">

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('images/luna-icon.svg') }}" alt="logo" />
                            </div>
                            <h4>Halo! Mari kita mulai!</h4>
                            <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="pt-3" action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Belum punya akun? <a href="/register" class="text-primary">SIGN UP</a>
                                </div>
                            </form>
                            <!-- container-scroller -->
                            <!-- plugins:js -->
                            <script src="../../vendors/js/vendor.bundle.base.js"></script>
                            <!-- endinject -->
                            <!-- Plugin js for this page -->
                            <!-- End plugin js for this page -->
                            <!-- inject:js -->
                            <script src="../../js/off-canvas.js"></script>
                            <script src="../../js/hoverable-collapse.js"></script>
                            <script src="../../js/template.js"></script>
                            <script src="../../js/settings.js"></script>
                            <script src="../../js/todolist.js"></script>
                            <!-- endinject -->

</body>

</html>
