@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{ asset('assets/admin/images/1.jpg') }}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15">@lang('Welcome to')
                    <strong>
                        {{ \App\Config\constants\Consts::sitename }}
                    </strong>
                </h4>
                <p>
                    {{ \App\Config\constants\Consts::adminLogin }}
                    @lang('to')
                    {{ \App\Config\constants\Consts::sitename }}
                    @lang('dashboard')
                </p>
                <form method="POST" action="{{ route('login') }}" class="cmn-form mt-30">
                    @csrf
                    <div class="form-group">
                        <label for="email">@lang('Email')</label>
                        <input type="text" name="email" class="form-control b-radius--capsule" id="email"
                            value="{{ old('email') }}" placeholder="@lang('Enter your email')">
                        <i class="las la-envelope input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="password">@lang('Password')</label>
                        <input type="password" name="password" class="form-control b-radius--capsule" id="password"
                            placeholder="@lang('Enter your password')">
                        <i class="las la-lock input-icon"></i>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <a href="{{ route('password.request') }}" class="text-muted text--small">
                            <i class="las la-lock"></i>@lang('Forgot password?')
                        </a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i
                                class="las la-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
