@include('layouts.header')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="forgot-pwd">
        <div class="container">
            <div class="forgot-pwd-main">
                <div class="forgot-pwd-grid">
                    <div class="forgot-pwd-item">
                        <div class="hs-store-heading">
                            <h1 class="common-heading forgot-pwd-h1">
                                Reset Your Password
                            </h1>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <!-- <input type="email" class="input-fields forgot-pwd-input form-control" id="email" name="email" :value="old('email')" required autofocus> -->
                                <input id="email" type="email" class="input-fields form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <div id="email" class="form-text">A password will be sent to your email address.</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="forgot-pwd-btn btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                        </form>
                    </div>
                    
                    <div class="forgot-pwd-item">
                        <img src="./assets/images/cemetery.jpg" alt="" class="forgot-img">
                    </div>
                </div>
            </div>
        </div>
   </section>

    <form method="POST" action="{{ route('password.email') }}" style="display:none;">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
@include('layouts.footer')