@extends('layouts.authlayout')
@section('title')
	Wachtwoord herstellen
@endsection

@section('content')
	<div class="page page--auth">
		<div class="page__image">
			<img src="https://images.pexels.com/photos/2283996/pexels-photo-2283996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
		</div>

		<a class="logo logo--link" href="{{ route('index') }}">
			eventify
		</a>

		<div class="panel">

			<div class="panel__title">
				Wachtwoord herstellen
			</div>
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
