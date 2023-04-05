@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6-md-8 d-flex">
            <img src="{{ asset('../../img/Type=Pagamenti.svg') }}" alt="logo" style="margin-right: 150px">

            <div class="card">
                <h2 style="color: #076dbb">Sign-up to your test app.</h2>
                <div class="card-header"><strong>Insert your credentials</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-center" href="{{ route('password.request') }}" style="color: black">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; width:100px">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
