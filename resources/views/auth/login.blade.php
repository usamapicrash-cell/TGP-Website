@extends('layouts.applogin')

@section('content')
<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="auth-cover-brand d-flex align-items-center gap-2 mb-4">
        <span class="app-brand-logo demo">
            <!-- Optional: Replace with your own logo SVG or image -->
            <img src="{{ url('assets/images/logo/logo.png') }}" alt="Logo" style="height:60px;">
        </span>
    </a>
    <!-- /Logo -->

    <div class="authentication-inner row m-0">
        <!-- Left Section -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2" style="background: #7ac0de61;">
            <img src="{{ url('assets/images/logo/loginpage.png') }}"
                class="auth-cover-illustration w-100" alt="auth-illustration">
            <img alt="mask" src="https://demos.pixinvent.com/materialize-html-admin-template/assets/img/illustrations/auth-basic-login-mask-light.png" class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-login-mask-light.png" data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" style="visibility: visible;">
        </div>
        <!-- /Left Section -->

        <!-- Login Form -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
            <div class="w-px-400 mx-auto pt-12 pt-lg-0">
                <h4 class="mb-1">Welcome! 👋</h4>
                <p class="mb-5">Please sign in to your account and start the adventure</p>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-floating form-floating-outline mb-5">
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                        <label for="email">Email Address</label>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <div class="form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required>
                                    <label for="password">Password</label>
                                </div>
                                <span class="input-group-text cursor-pointer">
                                    <i class="icon-base ri ri-eye-off-line icon-20px"></i>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="mb-5 d-flex justify-content-between mt-5">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember"> Remember Me </label>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                </form>

                <!--  -->

            </div>
        </div>
        <!-- /Login Form -->
    </div>
</div>
@endsection