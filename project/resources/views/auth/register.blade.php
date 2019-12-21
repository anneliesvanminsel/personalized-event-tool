@extends('layouts.authlayout')
@section('title')
	registreren
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
				Account aanmaken
			</div>

			<div class="panel__body">
				<form method="POST" action="{{ route('register') }}">
					@csrf

					<div class="form__group">
						<input
							id="name"
							type="text"
							class="form__input @error('name') is-invalid @enderror"
							name="name" value="{{ old('name') }}"
							placeholder="bv. Jan Peeters"
							required
							autocomplete="name"
							autofocus
						>

						<label for="name" class="form__label">
							Naam
						</label>

						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror

					</div>

					<div class="form__group">


							<input
								id="email"
								type="email"
								class="form__input @error('email') is-invalid @enderror"
								name="email"
								placeholder="bv. jan.peeters@mail.be"
								value="{{ old('email') }}"
								required
								autocomplete="email"
							>
							<label for="email" class="form__label">
								{{ __('E-Mail Address') }}
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
								placeholder="Jouw wachtwoord"
								name="password"
								required
								autocomplete="new-password"
							>
							<label for="password" class="form__label text-md-right">
								Wachtwoord
							</label>


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

					<div class="form__group">
							<button type="submit" class="btn btn--full">
								Maak een account
							</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
