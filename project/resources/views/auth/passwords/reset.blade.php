@extends('layouts.authlayout')
@section('title')
    aanmelden
@endsection

@section('content')
    <div class="header__container">
        <header class="header">
            <a class="logo has-lines" href="{{ route('index') }}">
                evento
            </a>
        </header>
    </div>
    
    <div class="auth">
        <div class="auth__image">
            <img src="{{ asset('images/toast.jpg') }}" alt="" loading="lazy">
        </div>
    
        <div class="panel">
            <h3 class="panel__title">
                Wachtwoord herstellen
            </h3>

            <div class="panel__body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form__group">

                        <input
                            id="email"
                            type="email"
                            class="form__input @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ $email ?? old('email') }}"
                            placeholder="bv. jan.peeters@mail.be"
                            required
                            autocomplete="email"
                            autofocus
                        >
                        <label for="email" class="form__label">
                            e-mailadres
                        </label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form__group">

                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Jouw nieuw wachtwoord"
                                required
                                autocomplete="new-password"
                            >
                            <label for="password" class="form__label">{{ __('Password') }}</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form__group">
                        <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            placeholder="Wachtwoord bevestigen"
                            required
                            autocomplete="new-password"
                        >

                        <label for="password-confirm" class="form__label">
                            Wachtwoord bevestigen
                        </label>
                    </div>

                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn--full">
                            Verander mijn wachtwoord
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
