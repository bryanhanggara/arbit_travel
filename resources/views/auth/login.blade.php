<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Logo and title company -->
    <link rel="icon" href="{{url('front_end/assets/image/logo2.png')}}">
    <title>Arbit</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{url('front_end/assets/css/style.css')}}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden;">

    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <div class="wrapper-login">
                <div class="login">
                    <h4>Continue Your Journey</h4>
                    <h6>Enter your credentials to continue your journey with us.</h6>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input">
                            <label>Password</label>
                            <input id="password" id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <ion-icon name="eye-outline" id="showPasswordToggle" onclick="togglePasswordVisibility('inputPassword', 'showPasswordToggle');
                                "></ion-icon>
                        </div>
                        <div class="terms">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe" required>
                                <label class="form-check-label" for="rememberMe">I agree to the <a href="">Terms &
                                        Privacy</a></label>
                            </div>
                            <h6 class="forgot-password"><a href="{{ route('password.request') }}">Forgot password?</a>
                            </h6>
                        </div>

                        <button type="submit" class="btn btn-success">Login</button>
                        <h6 class="register-here">Dont have an account? <a href="{{route('register')}}">Register here</a></h6>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 tablet-off mobile-off">
            <div class="wrapper-image">
                <img src="{{url('front_end/assets/image/6276023.jpg')}}" alt="">
            </div>
        </div>
    </div>

    <div class="footer fixed-bottom d-lg-none d-md-block d-sm-block">
        <div class="container">
            <!-- <hr class="cp"> -->
            <div class="credit">
                <div class="copyright">&copy 2023 Arbit. All Rights Reserved.</div>
                <div class="social"><ion-icon name="logo-instagram"></ion-icon><ion-icon
                        name="logo-facebook"></ion-icon><ion-icon name="logo-twitter"></ion-icon></div>
            </div>
        </div>
    </div>


    <!-- JS -->
    <script src="assets/js/script.js"></script>
    <!-- script bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
    <!-- script icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>