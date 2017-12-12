@extends('layouts.template')

@section('accountMenu')

@endsection

@section('content')


    <style type="text/css">
    .auth-section {
    max-width: 600px;
    padding: 20px;
    margin: 0 auto;
    }
    </style>

    <section class="shadow r_corners auth-section">
        <form  role="form" method="POST" action="{{ url('/login') }}">
             {{ csrf_field() }}
            <h2 class="color_dark tt_uppercase m_bottom_20">Войти</h2>

            <div class="small error-message"></div>

            <a class="color_dark f_size_medium" href="{{ url('/register') }}">Ещё не зарегистрированы?</a>

            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">

                <input id="user-login" type="text" class="r_corners full_width" name="login" placeholder="Логин" value="{{ old('login') }}" >

                <div class="small error-message">

                    @if ($errors->has('login'))
                        <span class="help-block">
                            <strong>{{ $errors->first('login') }}</strong>
                        </span>
                    @endif

                </div>



            </div>

            <a class="color_dark f_size_medium" href="{{ url('/password/reset') }}">Забыли пароль?</a>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <input id="user-password" class="r_corners full_width" name="password" placeholder="пароль" type="password">



                <div class="small error-message">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <div class="form-group">

                <input id="user-remember_me" class="d_none" name="remember"  type="checkbox">

                <label for="user-remember_me">Запомнить меня</label>

                <div class="small error-message"></div>

            </div>

            <div class="form-group">

                <button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover" type="submit">Войти</button>

            </div>
    </form>

</section>





@endsection
