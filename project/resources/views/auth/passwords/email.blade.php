@extends('layouts.authlayout')
@section('title')
	Wachtwoord herstellen
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
				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif

				<form method="POST" action="{{ route('password.email') }}">
					@csrf

					<div class="form__group">
						<input
							id="email"
							type="email"
							class="form__input @error('email') is-invalid @enderror"
							name="email"
							value="{{ old('email') }}"
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

					<div class="">
						<button type="submit" class="btn btn--full">
							{{ __('Send Password Reset Link') }}
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
