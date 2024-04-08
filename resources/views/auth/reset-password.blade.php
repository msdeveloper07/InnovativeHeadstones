@include('layouts.header')
<section class="forgot-pwd">
    <div class="container">
        <div class="forgot-pwd-main">
            <div class="forgot-pwd-grid">
                <div class="forgot-pwd-item">
                    <div class="hs-store-heading">
                        <h1 class="common-heading forgot-pwd-h1">
                            {{ __('Reset Password') }}
                        </h1>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="input-fields form-control  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Password') }}</label>
                            <div class="pswd-div">
                                <input id="password" type="password" class="input-fields form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i id="password-eye-toggle" class="fa-solid fa-eye-slash"></i>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="password-confirm" class="col-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="cpswd-div">
                                <input id="password-confirm" type="password" class="input-fields form-control" name="password_confirmation" required autocomplete="new-password">
                                <i id="confirm-password-eye-toggle" class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>

                        <button type="submit" class="forgot-pwd-btn btn btn-primary">{{ __('Reset Password') }}</button>
                    </form>
                </div>

                <div class="forgot-pwd-item">
                    <img src="../assets/images/cemetery.jpg" alt="" class="forgot-img">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card" style="display:none;">
    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<div class="form-group row" style="display:none;">
    <x-guest-layout>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</div>
<script>
    //Password Eye Toggle
    document.getElementById('password-eye-toggle').addEventListener('click', function() {
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

    //Confirm Password Eye Toggle
    document.getElementById('confirm-password-eye-toggle').addEventListener('click', function() {
        var passInput = document.getElementById('password-confirm');
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