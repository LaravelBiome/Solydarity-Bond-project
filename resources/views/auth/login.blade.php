@extends('layouts.welcome')
@section('autentification')
<div class="row">
    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-hidden">
                <div class="card-header text-center" data-background-color="blue">
                    <h4 class="card-title">Login</h4>
                </div>

                <div class="card-content">

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-group label-floating">
                            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <div class="form-group label-floating">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">compare_arrows</i>
                        </span>
                        <div class="form-group label-floating">
                            <div class="form-check">
                                <input class="form-check-inline" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Rester connecté </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer text-center">
                    <button type="submit" class="btn btnlogin ">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-danger btn-simple btn-wd btn-lg"href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

