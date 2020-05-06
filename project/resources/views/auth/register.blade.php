@extends('layouts.authlayout')
@section('title')
	registreren
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
				Account aanmaken
			</h3>

			<div class="panel__body">
				<form method="POST" action="{{ route('register') }}">
					@csrf
					
					<div class="form__group">
						<input
								id="name"
								type="text"
								class="form__input @error('name') is-invalid @enderror"
								name="name"
								placeholder="bv. Jan Peeters"
								value="{{ old('name') }}"
								required
						>
						<label for="name" class="form__label">
							Volledige naam
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
					<a class="auth__link" href="{{ route('login') }}">
						Al een account?
						<span class="link">
							Meld je nu aan.
						</span>
					</a>
				</form>
			</div>
		</div>
	</div>
	{{--<script> TODO: fix this
        $(document).ready(function(){
            $('#checkbox').on('change', function(){
                $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
            });
        });
	</script>
	<input type="password" id="password">
	<input type="checkbox" id="checkbox">Show Password--}}
@endsection
