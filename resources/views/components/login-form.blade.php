<form class="form-horizontal" method="POST" action="{{ route('login') }}" id="login">
    {{ csrf_field() }}


    <label for="email">E-Mail Адрес</label>
    <input type="email" name="email" class="form-control{{ $errors->first('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" id="email" placeholder="E-Mail" required autofocus>
    <div class="invalid-feedback" id="invalid-email">
        {{ $errors->first('email') ? $errors->first('email') : '' }}
    </div>

    <label for="password">Пароль</label>
    <input type="password"  name="password" class="form-control{{ $errors->first('password') ? ' is-invalid' : '' }}" id="password" placeholder="Введите пароль" required>
    <div class="invalid-feedback" id="invalid-password">
        {{ $errors->first('password') ? $errors->first('password') : '' }}
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary" id="submit">
                Войти
            </button>

            <a class="btn btn-link" href="{{-- route('password.request') --}}">
                Forgot Your Password?
            </a>
        </div>
    </div>

    <div class="form-group">
        <p class="text-center text-muted">Еще не зарегистрированы?</p>
        <p class="text-center text-muted"><a href="http://posmotrim.by/?view=reg"><strong>Регистрация</strong></a>! Это легко и займет 1 минуту и дает вам доступ к расширенным функциям сайта!</p>
    </div>
</form>