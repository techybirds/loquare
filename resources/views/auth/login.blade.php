@extends('layouts.app')
@section('title', 'Loquare | Login')
@section('content')
    <div id="login" class="popup" style="margin: 100px auto;">
        <div class="popup__inner">
            <div class="popup__title">Log In</div>
            <div class="popup-form popup-form--login">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="popup-form__row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="st-field" name="email" id="email" placeholder="e-mail" type="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="popup-form__row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input class="st-field" name="password" id="password" placeholder="password" type="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="popup-form__row">
                        <div class="checkbox checkbox--small" style="float: left;">
                            <input id="remember_me" type="checkbox" name="remember">
                            <label for="remember_me">
                                <span></span> Remember Me
                            </label>
                        </div>

                        <a href="{{ route('password.request') }}" class="popup__link popup__link--bold" style="margin-top: 10px; float: right;">forgot password?</a>
                    </div>
                    <div class="popup-form__btns" style="clear:both;">
                        <button class="popup__ok-btn" type="submit">log in</button>
                    </div>

                    <div class="popup__social-login">
                        <div class="popup__social-login-t">or</div>

                        <div class="popup__center-links">
                            <a href="#" class="popup__social-enter popup__social-enter--fb">
                                login with Facebook
                            </a>
                            <a href="#" class="popup__social-enter popup__social-enter--google">
                                login with Google
                            </a>
                        </div>

                        <div class="popup__signup">
                            Don’t have an account? <a href="#">Sign Up</a>
                        </div>
                    </div>


                </form>
            </div>


        </div>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){ $(".page_loader").fadeOut(500) }, 1000);
    });
</script>
@endsection
