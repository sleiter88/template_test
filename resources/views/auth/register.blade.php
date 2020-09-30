@extends('layouts.auth')

@section('css')
    <style>
        .register-button {
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

        .register-button:hover {
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

<div class="new-login-box" style="margin-top: 5%">
    <div class="white-box" style="padding: 0px; width: 450px">
        <p class="box-title m-b-0" style="font-size: 18pt; font-weight: 500; text-align: center; text-transform: initial;">¡Crea tu cuenta!</p>
        <!-- <small>Enter your details below</small> -->
        <form class="form-horizontal new-lg-form" id="loginform" method="POST" action="{{ route('admin.users.register') }}">
        @csrf
            <div class="form-group ">
                <div class="col-xs-12">

                    <input id="name" type="text" placeholder="Nombre" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>


            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="last_name" type="text" placeholder="Apellido" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}">

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="password" placeholder="Contraseña"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password-confirm" placeholder="Repite la contraseña" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary p-t-0">
                        <input id="checkbox-signup" type="checkbox">
                        <label for="checkbox-signup" style="text-transform: initial;"> Acepto todos los <a href="#">términos y codiciones</a> y la <a href="#">política de privacidad</a> </label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button type="submit" class="register-button">
                        Crear cuenta →
                    </button>
                </div>
            </div>
            <hr style="border-color: #004377">
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p style="font-weight: 500">¿Ya tienes un cuenta?
                        <a href="{{ route('login') }}" class="text-danger m-l-5"><b>¡Entra aquí!</b></a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
