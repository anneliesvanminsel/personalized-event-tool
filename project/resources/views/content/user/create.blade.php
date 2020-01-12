@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<section class="page-alignment wizard">
		<div class="wizard__inner">
			<div class="wizard__item">
				Organisatiegegevens
			</div>
			<div class="wizard__item">
				Adresgegevens
			</div>
			<div class="wizard__item active is-blue">
				Gebruikergegevens
			</div>
		</div>
	</section>
	<section class="page-alignment spacing-top-m">
		<h1>
			Voeg jouw hoofdgebruiker toe
		</h1>
		<p class="subheading">
			Voeg het adminaccount van het bedrijf <span class="accent is-blue">{{ $organisation['name'] }}</span> toe. <br>
			Dit wordt het account waarmee u vanaf nu kunt inloggen en evenementen kunt aanpassen.
		</p>

		<form method="POST" action="{{ route('organisation.admin.postcreate', ['organisation_id' => $organisation['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf

			<h2 class="spacing-top-m">
				Accountgegevens
			</h2>
			
			<div class="form__group is-blue">
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
			
			<div class="form__group is-blue">
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

			<div class="form__group is-blue">
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
				<button type="submit" class="btn btn--full is-blue">
					Link dit account
				</button>
			</div>
		</form>
	</section>
@endsection