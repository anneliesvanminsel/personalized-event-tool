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
				Aanmelden
			</h3>

			<div class="panel__body">
				<form method="POST" action="{{ route('login') }}" class="form">
					@csrf

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
							class="form__input @error('password') is-invalid @enderror"
							name="password"
							placeholder="Jouw wachtwoord"
							required
							autocomplete="current-password"
						>
						<label for="password" class="form__label">
							wachtwoord
						</label>

						@error('password')
							<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror

					</div>
					
					@if (Route::has('password.request'))
						<div class="auth__link">
							<a class="link" href="{{ route('password.request') }}">
								Wachtwoord vergeten?
							</a>
						</div>
						<br>
					@endif

					<div class="">
						<button type="submit" class="btn btn--full">
							aanmelden
						</button>
						
						<a class="auth__link" href="{{ route('register') }}">
							Nog geen account?
							<span class="link">
								Maak er snel één aan.
							</span>
						</a>
					</div>
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
