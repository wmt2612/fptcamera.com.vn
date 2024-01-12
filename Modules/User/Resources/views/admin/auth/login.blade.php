@extends('user::admin.auth.layout')

@section('title', trans('user::auth.login'))

<style>
    .header-login a {
        background-image: url('{{ Theme::url("assets/global/webmaster.svg") }}')!important;
        width: 165px !important;
        /* height: 102px !important; */
        background-size: contain !important;
        background-position: center top;
        background-repeat: no-repeat;
        color: #444;
        height: 84px;
        font-size: 20px;
        font-weight: 400;
        line-height: 1.3;
        margin: 0 auto 25px;
        padding: 0;
        text-decoration: none;
        width: 84px;
        text-indent: -9999px;
        outline: 0;
        overflow: hidden;
        margin-bottom: 0;
        display: block;
    }
    body {
        background-image: url('{{ Theme::url("assets/global/thietkewebsite.jpg") }}') !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        display: table;
        min-height: 100vh;
        width: 100%;
        padding: 0;
    }
</style>
@section('content')
    <div class="login-wrapper">
        <div class="bg-blue">
            <div class="reflection"></div>
        </div>

        <div class="form-inner clearfix">
            <h1 class="header-login"><a href="http://webmaster.com.vn">http://webmaster.com.vn</a></h1>
            {{-- <a style="width:100%;text-align:center" target="_blank" href="https://webmaster.com.vn">
                <h3 class="text-center">WEBMASTER</h3>
            </a> --}}

            <form method="POST" action="{{ route('admin.login.post') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">{{ trans('user::auth.email') }}<span>*</span></label>

                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="{{ trans('user::attributes.users.email') }}" autofocus>

                    <div class="input-icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>

                    {!! $errors->first('email', '<span class="help-block text-red">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="password">{{ trans('user::auth.password') }}<span>*</span></label>

                    <input type="password" class="form-control" name="password" placeholder="{{ trans('user::attributes.users.password') }}">

                    <div class="input-icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>

                    {!! $errors->first('password', '<span class="help-block text-red">:message</span>') !!}
                </div>

                <button type="submit" class="btn btn-primary" data-loading>
                    {{ trans('user::auth.login') }}
                </button>

                <div class="clearfix"></div>

                <div class="checkbox pull-left">
                    <input type="hidden" name="remember_me" value="0">
                    <input type="checkbox" name="remember_me" value="1" id="remember-me">

                    <label for="remember-me">{{ trans('user::attributes.auth.remember_me') }}</label>
                </div>

                <a href="{{ route('admin.reset') }}" class="text-center pull-right">
                    {{ trans('user::auth.forgot_password') }}
                </a>
            </form>
        </div>
    </div>
@endsection
