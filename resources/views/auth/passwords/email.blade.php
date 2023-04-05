@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6-md-8 d-flex">
            <img src="{{ asset('../../img/Type=Pagamenti.svg') }}" alt="logo" style="margin-right: 150px">

            <div class="card mt-5" style="height: 400px;">
                <h2 style="color: #076dbb" class="text-center">Reset your password</h2>
                <div class="card-header"><strong>Have you forgot your password ? </strong> 
                <p>Do not worry, insert here your email and we will send you a link to reset your password.</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verify.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; width:200px">
                                    Reset your password
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
