@extends('main-layouts.app')

@section('content')

<style>
    /* Page spacing so header/footer don’t collide */
    .auth-page {
        padding: 120px 0 50px;
        /* background: #f9fafb; */
    }

    .auth-card {
        max-width: 1100px;
        margin: auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .auth-left {
        background: #f4f6f8;
        padding: 60px;
        border-right: 1px solid #e5e7eb;
    }

    .auth-left h2 {
        font-weight: 700;
        margin-bottom: 15px;
    }

    .auth-left p {
        color: #6b7280;
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .auth-left img {
        width: 100%;
        max-width: 360px;
    }

    .auth-right {
        padding: 60px;
    }

    .auth-right h3 {
        font-weight: 700;
        margin-bottom: 5px;
    }

    .auth-right p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .form-control {
        height: 46px;
        border-radius: 6px;
    }

    .auth-meta {
        font-size: 14px;
    }

    .auth-meta a {
        text-decoration: none;
    }

    .auth-meta a:hover {
        text-decoration: underline;
    }

    @media (max-width: 991px) {
        .auth-left {
            display: none;
        }

        .auth-right {
            padding: 40px;
        }
    }
</style>

<div class="auth-page">
    <div class="auth-card row g-0">

        <!-- LEFT CONTENT -->
        <div class="col-lg-6 auth-left">
            <h2>Welcome Back</h2>
            <p>
                Sign in to access your dashboard, manage resumes,
                and continue building your professional profile.
            </p>

            <img src="https://www.visualcv.com/static/457076c393ee960dcd325ed0f79eb6e9/e3663/CV_Builder_2x.png" alt="Login Illustration">
        </div>

        <!-- RIGHT FORM -->
        <div class="col-lg-6 auth-right">

            <x-auth-session-status class="mb-3" :status="session('status')" />

            <h3>Login</h3>
            <p>Enter your credentials to continue</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input
                        id="email"
                        class="form-control mt-1"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                        id="password"
                        class="form-control mt-1"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger small" />
                </div>

                <!-- Remember / Forgot -->
                <div class="d-flex justify-content-between align-items-center mb-4 auth-meta">
                    <label class="d-flex align-items-center">
                        <input type="checkbox" name="remember" class="me-2">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <!-- BUTTON (THEME SAFE) -->
                <div class="d-grid">
                    <x-primary-button>
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection