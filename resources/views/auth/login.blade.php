@extends('layouts.auth')

@section('css')
    <style>

        .login-button {
            background: #f0b342 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            width: 140px !important;
            /* font-weight: bold !important; */
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 5px 5px !important;
            margin: 10px 5px !important;
        }

        .login-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
        }

        ::placeholder { /* Firefox, Chrome, Opera */
            color: #004377 !important;
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #004377 !important;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color: #004377 !important;
        }

        input {
            border-color: #004377 !important;
        }

        .checkbox-primary input[type="checkbox"]:checked + label::before {
            background-color: #004377 !important;
            border-color: #004377 !important;
        }

        a, a:active, a:focus, a:hover {
            color: #004377 !important;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')

<div class="new-login-box">
    <div class="white-box">
        <!-- <h3 class="box-title m-b-0">{{ __('Login') }}</h3>
        <small>Enter your details below</small> -->
        <form class="form-horizontal new-lg-form" id="loginform" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group  m-t-20">
            <div class="col-xs-12">
            <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">

            <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember" style="text-transform: initial;">
                    Recuérdame
                </label>
            </div>
            @if (Route::has('password.request'))
                <a id="to-recover" class="text-dark pull-right" href="{{ route('password.request') }}">
                    <i class="fa fa-lock m-r-5"></i> ¿Olvidó su contraseña?
                </a>
            @endif
            <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div> -->
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
            <button type="submit" class="login-button">
                Entrar →
            </button>
            <!-- <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button> -->
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
            <p>¿No tienes cuenta?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-primary m-l-5"><b>!Registrate aquí!</b></a>
                @endif
            </p>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
