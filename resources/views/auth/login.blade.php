<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="my/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="my/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="my/assets/css/slicknav.css">
    <link rel="stylesheet" href="my/assets/css/flaticon.css">
    <link rel="stylesheet" href="my/assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="my/assets/css/gijgo.css">
    <link rel="stylesheet" href="my/assets/css/animate.min.css">
    <link rel="stylesheet" href="my/assets/css/animated-headline.css">
    <link rel="stylesheet" href="my/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="my/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="my/assets/css/themify-icons.css">
    <link rel="stylesheet" href="my/assets/css/slick.css">
    <link rel="stylesheet" href="my/assets/css/nice-select.css">
    <link rel="stylesheet" href="my/assets/css/style.css">
</head>
<body style="background-color:rgb(49,39,39);">


<main class="login-body" data-vide-bg="assets/img/login-bg.mp4">
    <!-- Login Admin -->
    <form class="form-default" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
{{--            <div style="text-align: center" class="logo-login">--}}
{{--                <a style="font-size: 1.5rem" class="btn btn-dark" href="{{ url('auth/google') }}"><img style="height: 30px" src="my/images/google.png" alt="none"> Use Google</a>--}}
{{--            </div>--}}
{{--            <h2>Or</h2>--}}
            <div class="form-input">
                <label for="name">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="name">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            {{--            <div class="form-input">--}}
            {{--                <div class="col-md-6 offset-md-4">--}}
            {{--                    <div class="form-check">--}}
            {{--                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
            {{--                        <label class="form-check-label" for="remember">--}}
            {{--                            {{ __('Remember Me') }}--}}
            {{--                        </label>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>

            <!-- Forget Password -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <!-- Forget Password -->
            <a href="/register" class="registration">Registration</a>
        </div>
    </form>
    <!-- /end login form -->
</main>


<script src="my/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="my/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="my/assets/js/popper.min.js"></script>
<script src="my/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="my/assets/js/jquery.slicknav.min.js"></script>

<!-- Video bg -->
<script src="my/assets/js/jquery.vide.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="my/assets/js/owl.carousel.min.js"></script>
<script src="my/assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="my/assets/js/wow.min.js"></script>
<script src="my/assets/js/animated.headline.js"></script>
<script src="my/assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="my/assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="my/assets/js/jquery.nice-select.min.js"></script>
<script src="my/assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="my/assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="my/assets/js/jquery.counterup.min.js"></script>
<script src="my/assets/js/waypoints.min.js"></script>
<script src="my/assets/js/jquery.countdown.min.js"></script>
<script src="my/assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="my/assets/js/contact.js"></script>
<script src="my/assets/js/jquery.form.js"></script>
<script src="my/assets/js/jquery.validate.min.js"></script>
<script src="my/assets/js/mail-script.js"></script>
<script src="my/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="my/assets/js/plugins.js"></script>
<script src="my/assets/js/main.js"></script>

</body>
</html>
