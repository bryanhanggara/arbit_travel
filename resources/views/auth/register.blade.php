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
            <div class="wrapper-register">
                <div class="login">
                    <h4>Start The Journey</h4>
                    <h6>Begin your journey by filling in the registration form.</h6>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input">
                            <label>Name</label>
                            <input id="name" placeholder="Enter Your Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input">
                            <label>Username</label>
                            <input id="username" placeholder="Enter Your Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input">
                            <label>Email</label>
                            <input id="email" placeholder="Your Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input">
                            <label>Password</label>
                            <input id="inputPassword" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <ion-icon name="eye-outline" id="showPasswordToggle" onclick="togglePasswordVisibility('inputPassword', 'showPasswordToggle');
                                "></ion-icon>
                        </div>
                        <div class="input">
                            <label>Confirm Password</label>
                            <input id="password-confirm inputConfirmPassword" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <ion-icon name="eye-outline" id="showConfirmPasswordToggle" onclick="togglePasswordVisibility('inputConfirmPassword', 'showConfirmPasswordToggle');
                                "></ion-icon>
                        </div>
                        <div class="form-check mt-3 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                            <label class="form-check-label" for="rememberMe" required>I agree to the <a href="">Terms &
                                    Privacy</a></label>
                        </div>

                        <button type="submit" class="btn btn-success">Register</button>
                        <h6 class="register-here">Already have an account? <a href="{{route('login')}}">Login here</a>
                        </h6>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7 tablet-off mobile-off">
            <div class="wrapper-image">
                <img src="{{url('front_end/assets/image/6262015.jpg')}}" alt="">
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
