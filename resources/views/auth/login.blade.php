@if (session()->has('jsAlert'))
    <script>
        alert('لقد تسجيل طلبكم بنجاح، المرجو التحقق من بريدكم الإلكتروني');

    </script>
@endif
@extends('layouts.app')
<style>
    .logo {
        width: 205px;
        height: 200px;
    }

</style>
@section('content')
    <div class="container">

        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <!-- Login Page Start Here -->
        <div class="login-page-wrap">
            <div class="login-page-content">
                <div class="login-box">
                    <div class="item-logo">
                        <img src="{{ asset('asset/files/img/fondLog.png') }}" alt="logo" class="logo">
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="text" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}"
                                required autocomplete="email" class="form-control @error('email') is-invalid @enderror"
                                autofocus>
                            <i class="far fa-envelope"></i>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>كلمة السر</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="كلمة السر"
                                name="password" required autocomplete="current-password">
                            <i class="fas fa-lock"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember-me">
                                <label for="remember-me" class="form-check-label">تذكرني</label>
                            </div>
                                <a class="btn btn-link" href="{{ url('/etudiant/password') }}">
                                    {{ __('هل نسيت كلمة السر؟') }}
                                </a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="login-btn">{{ __('تسجيل الدخول') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
