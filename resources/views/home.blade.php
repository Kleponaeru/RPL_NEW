@extends('Layouts.main')
@section('title', 'LUNA')
@section('content')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!DOCTYPE html>
    <html>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet" />

        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />
    </head>

    <body>
        <div class="hero_area">

            <!-- header section strats -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container">
                        <a class="navbar-brand" href="/">
                            <span>
                                LUNA
                            </span>
                        </a>
                        <div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->

            <!-- slider section -->
            <section class="slider_section ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1">
                                        <div class="detail-box">
                                            <h1>
                                                Manage Your Waste with - LUNA<br>
                                            </h1>
                                            <p>
                                                Introducing an innovative online platform exclusively designed for effective
                                                waste management in Yogyakarta. <br><br>
                                                This dedicated website serves as a comprehensive resource, offering a
                                                user-friendly interface to enhance their waste disposal practices.
                                            </p>
                                            <div class="btn-box">
                                                <a href="/login" class="btn-1">
                                                    Login
                                                </a>
                                                <a href="/register" class="btn-2">
                                                    Register
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-md-1 col-md-4 img-container">
                                        <div class="img-box">
                                            <img src="images/slider-img.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->

            <!-- footer section -->
            <footer class="container-fluid footer_section ">
                <div class="container">
                    <p>
                        2023 &copy; <span id="displayDate"></span> All rights reserved by LUNA</a>
                    </p>
                </div>
            </footer>
            <!-- end  footer section -->

            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/bootstrap.js"></script>
            <script src="js/custom.js"></script>
        </div>
    </body>

    </html>
@endsection
