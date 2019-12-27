@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<section class="page-alignment steps spacing-top-m">
		<div class="row row--stretch">
			<div class="steps__item">
				Organisatiegegevens
			</div>
			<div class="steps__item active">
				Gebruikergegevens
			</div>
		</div>
	</section>
	<section class="page-alignment spacing-top-m">
		<h1>
			Voeg jouw hoofdgebruiker toe
		</h1>
		<p class="subheading">
			Voeg het adminaccount van het bedrijf <span class="accent">{{ $organisation['name'] }}</span> toe. <br>
			Dit wordt het account waarmee u vanaf nu kunt inloggen en evenementen kunt aanpassen.
		</p>

		<form method="POST" action="{{ route('organisation.admin.postcreate', ['organisation_id' => $organisation['id']]) }}" class="form" enctype="multipart/form-data">
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
					Link dit account
				</button>
			</div>
		</form>
	</section>
@endsection