@include('layouts.header')
    <section class="login-sec">
        <div class="container">
            <div class="login-sec-main">
                <div class="hs-store-heading">
                    <h1 class="common-heading">
                        My Account
                    </h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- <hr /> -->
                <div class="login-grid">
                    <div class="login-item">
                        <div class="hs-store-heading">
                            <h1 class="common-heading">
                                Login
                            </h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="email" id="email" class="input-fields login-input form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="passowrd-input-div">
                                    <input id="password" type="password" class="input-fields login-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <i id="password-eye-toggle" class="fa-solid fa-eye-slash"></i>
                                </div>
                                
                                
                                <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>

                            <div class="forgot-div mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="input-fields login-input form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                <div class="forget-pwd">
                                    <a class="forgot-pwd-link" href="{{ route('password.request') }}">Forget Password</a>
                                </div>
                            </div>

                            <button type="submit" class="login-btn btn btn-primary">{{ __('Login') }}</button>

                        </form>
                    </div>

                    <hr class="hr-line">

                    <div class="reg-item">
                        <div class="hs-store-heading">
                            <h1 class="common-heading reg-h1">
                                Register
                            </h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="input-fields register-input form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                <div id="emailHelp" class="form-text">A password will be sent to your email address.</div>
                                <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <button type="submit" class="register-btn btn btn-primary">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="display:none;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('password-eye-toggle').addEventListener('click', function () {
    var passInput = document.getElementById('password');
    var type = passInput.getAttribute('type') === "password" ? "text" : "password";
    passInput.setAttribute('type', type);

    var eyeIcon = this;
    if (type === "text") {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        eyeIcon.classList.add("fa-eye-slash");
        eyeIcon.classList.remove("fa-eye");
    }
});
    </script>
@include('layouts.footer')