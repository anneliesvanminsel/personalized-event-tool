@extends('layouts.authlayout')
@section('title')
	aanmelden
@endsection

@section('content')
	<div class="page page--auth">
		<div class="page__image">
			<img src="https://images.pexels.com/photos/2283996/pexels-photo-2283996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
		</div>

		<div class="logo">
			eventify
		</div>

		<div class="panel">

			<div class="panel__title">
				Aanmelden
			</div>

			<div class="panel__body">
				<form method="POST" action="{{ route('login') }}" class="form">
					@csrf

					<div class="form__group">
						<label for="email" class="">
							email adres
						</label>

						<div class="">
							<input
								id="email"
								type="email"
								class="form-control @error('email') is-invalid @enderror"
								name="email"
								value="{{ old('email') }}"
								required
								autocomplete="email"
								autofocus
							>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="">
						<label for="password" class="">
							wachtwoord
						</label>

						<div class="">
							<input
								id="password"
								type="password"
								class="form-control @error('password') is-invalid @enderror"
								name="password"
								required
								autocomplete="current-password"
							>

							@error('password')
								<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="">
						<div class="">
							<div class="">
								<input
									class="form-check-input"
									type="checkbox"
									name="remember"
									id="remember"
									{{ old('remember') ? 'checked' : '' }}
								>

								<label class="" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
					</div>

					<div class="">
						<div class="">
							<button type="submit" class="btn btn--full">
								aanmelden
							</button>

							@if (Route::has('password.request'))
								<a class="btn btn--link" href="{{ route('password.request') }}">
									Wachtwoord vergeten?
								</a>
							@endif
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
