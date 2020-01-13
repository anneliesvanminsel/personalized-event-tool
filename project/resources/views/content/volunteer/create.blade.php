@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Voeg een medewerker toe
		</h1>
		
		<form method="POST" action="{{ route('volunteer.postcreate', ['organisation_id' => $organisation['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf
			
			<h2 class="spacing-top-m">
				Accountgegevens
			</h2>
			
			<div class="form__group">
				<input
						id="email"
						type="email"
						class="form__input @error('email') is-invalid @enderror"
						name="email"
						placeholder="bv. jan.peeters@mail.be"
						value="{{ old('email') }}"
						required
						autofocus
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
			
			<div class="spacing-top-m">
				<button type="submit" class="btn btn--full">
					Voeg de medewerker toe
				</button>
			</div>
		</form>
	</section>
@endsection