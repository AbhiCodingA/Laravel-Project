<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TrendTrails - Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('static') }}/assets/imgs/theme/favicon.html">
    <!-- NewsBoard CSS  -->
    <link rel="stylesheet" href="{{ asset('static') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('static') }}/assets/css/widgets.css">
    <link rel="stylesheet" href="{{ asset('static') }}/assets/css/responsive.css">

    <style>
        * {
            font-size: 16px;
        }

        .container {
            max-width: 90%;
            margin: 0 auto;
        }


        .form-control,
        .button {
            width: 100%;
            margin-bottom: 15px;
        }

        .form-control {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
            border: none
        }

        .registerLink:hover {
            text-decoration: underline
        }

    </style>

</head>

<body>
    <div class="scroll-progress primary-bg"></div>

    @include('homePage.inc.header')

    <!-- Start Main content -->

    <main class="bg-grey pt-50 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 bg-white border-radius-10">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3 class="mb-30 font-weight-900">Login to your account</h3>
                            </div>
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="email"
                                        placeholder="Your Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password"
                                        placeholder="Password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember
                                                    me</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn-block">Log in</button>
                                </div>
                            </form>
                            <div class="divider-text-center mt-15 mb-15">
                                <span> or</span>
                            </div>
                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{ route('register') }}" class="registerLink">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main content -->

    <div class="dark-mark"></div>

    <!-- Vendor JS-->
    <script src="{{ asset('static') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/popper.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.slicknav.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/slick.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/wow.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.ticker.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.sticky.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/waypoints.min.js"></script>
    <script src="{{ asset('static') }}/assets/js/vendor/jquery.theia.sticky.js"></script>
    <!-- NewsBoard JS -->
    <script src="{{ asset('static') }}/assets/js/main.js"></script>
</body>

</html>
