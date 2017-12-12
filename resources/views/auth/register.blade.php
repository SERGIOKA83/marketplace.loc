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

                <form role="form" method="POST" action="{{ url('/register') }}" >
                    {{ csrf_field() }}

                    <h2 class="color_dark tt_uppercase m_bottom_20">Регистрация</h2>

                    <a class="color_dark f_size_medium" href="{{ url('/login') }}">Уже зарегистрированы?</a>

                    <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">

                        <input id="user-login" class="r_corners full_width" type="text" name="login" placeholder="Логин" value="{{ old('login') }}">

                        <div class="small error-message">
                            @if ($errors->has('login'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <input id="user-name" class="r_corners full_width" type="text" name="name" placeholder="Имя" value="{{ old('name') }}">

                        <div class="small error-message">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <input id="user-email" class="r_corners full_width" type="email" name="email" placeholder="email" value="{{ old('email') }}">

                        <div class="small error-message">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input id="user-password" class="r_corners full_width" name="password" placeholder="Пароль" type="password">

                        <div class="small error-message">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                        <input id="user-password" class="r_corners full_width" name="password_confirmation" placeholder="Подтверждение пароля" type="password">

                        <div class="small error-message">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="g-recaptcha" data-sitekey="6Ld3dAgTAAAAAKf3toHGHEl2zX0dRtPWDr6ypIrp">
                            <div style="width: 304px; height: 78px;">
                                <div>
                                    <iframe src="Handwork.by%20-%20%D0%BF%D0%B5%D1%80%D0%B2%D1%8B%D0%B9%20handmade%20%D0%BF%D0%BE%D1%80%D1%82%D0%B0%D0%BB%20%D0%91%D0%B5%D0%BB%D0%B0%D1%80%D1%83%D1%81%D0%B8.%20%D0%A0%D1%83%D1%87%D0%BD%D0%B0%D1%8F%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0,%20%D1%80%D1%83%D0%BA%D0%BE%D0%B4%D0%B5%D0%BB%D0%B8%D0%B5,%20%D1%85%D0%B5%D0%BD%D0%B4%20%D0%BC%D0%B5%D0%B9%D0%B4,%20%D0%B0%D0%B2%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0,%20%D1%85%D1%8D%D0%BD%D0%B4%20%D0%BC%D0%B5%D0%B9%D0%B4,%20%D0%BF%D0%BE%D0%B4%D0%B5%D0%BB%D0%BA%D0%B8_files/anchor.htm" role="presentation" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" width="304" height="78" frameborder="0"> </iframe>

                                </div>

                                <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea>

                            </div>

                        </div>

                        <div class="small error-message"></div>

                    </div>


                    <div class="form-group">

                        <button class="button_type_4 r_corners bg_scheme_color color_light tr_all_hover signup-btn" type="submit">Регистрироваться</button>
                    </div>
                </form>
            </section>

                  </div>
    </div>


@endsection
