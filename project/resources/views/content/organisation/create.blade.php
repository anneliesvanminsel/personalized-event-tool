@extends('layouts.masterlayout')
@section('title')
	evento - registreer organisatie
@endsection
@section('content')
	<section class="page-alignment steps spacing-top-m">
		<div class="row row--stretch">
			<div class="steps__item active">
				Organisatiegegevens
			</div>
			<div class="steps__item">
				Gebruikergegevens
			</div>
		</div>
	</section>
	<section class="page-alignment spacing-top-l">
		<h1>
			Start nu jouw organisatie
		</h1>
		<p class="subheading">
			Je hebt gekozen voor het <span class="accent">{{$subscription->title}}</span> pakket.
		</p>

		<form method="POST" action="{{ route('organisation.postcreate', ['subscription_id' => $subscription['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf

			<h2 class="spacing-top-m">
				1. Algemene gegevens
			</h2>

			<div class="form__group">
				<input
					id="name"
					type="text"
					class="form__input @error('name') is-invalid @enderror"
					name="name"
					placeholder="bv. Rock Werchter of Kerstdrink 2019"
					value="{{ old('name') }}"
					required
					autofocus
					autocomplete="off"
				>

				<label for="name" class="form__label">
					Bedrijfsnaam
				</label>

				@error('name')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<textarea
						form="form-edit"
						id="description"
						class="form__input @error('description') is-invalid @enderror"
						name="description"
						placeholder="Een korte beschrijving van jouw evenement."
						required
						autocomplete="off"
						maxlength="1000"
				>{{ old('description') }}</textarea>
				
				<label for="description" class="form__label">
					Korte beschrijving
				</label>
				
				<div id="word-counter" class="form__label is-counter"></div>
				
				@error('description')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				<script>
                    document.getElementById('description').onkeyup = function () {
                        document.getElementById('word-counter').innerHTML = this.value.length + "/1000";
                    };
				</script>
			</div>

			<div class="form__group">
				<input
					id="logo"
					type="file"
					class="form__input @error('logo') is-invalid @enderror"
					name="logo"
					placeholder="bv. het event van de eeuw"
					value="{{ old('logo') }}"
					required
					autocomplete="off"
				>

				<label for="logo" class="form__label">
					Bedrijfslogo
				</label>

				@error('logo')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<h2 class="spacing-top-m">
				2. Opmaak mogelijkheden van de bedrijfspagina
			</h2>

			<p>
				De volgende kleuren worden gebruikt om de <span class="accent">informatiepagina van het bedrijf</span> op te maken.
			</p> <br>
			<p>
				<span class="accent">Let op!: </span> <br>
				De kleuren zullen soms samen gebruikt worden, let dan ook op de leesbaarheid. Dit kan je testen via
				<a href="https://webaim.org/resources/contrastchecker/" target="_blank" class="link">
					deze website
				</a>.
			</p>

			<div class="form__group">
				<input
					id="bkgcolor"
					type="text"
					class="form__input @error('bkgcolor') is-invalid @enderror"
					name="bkgcolor"
					placeholder="bv. #112233"
					value="{{ old('bkgcolor') }}"
					autocomplete="off"
				>

				<label for="bkgcolor" class="form__label">
					Accentkleur
				</label>

				@error('bkgcolor')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="form__group">
				<input
					id="textcolor"
					type="text"
					class="form__input @error('textcolor') is-invalid @enderror"
					name="textcolor"
					placeholder="bv. #112233"
					value="{{ old('textcolor') }}"
					autocomplete="off"
				>

				<label for="textcolor" class="form__label">
					Tekstkleur
				</label>

				@error('textcolor')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>


			<div class="">
				<button type="submit" class="btn btn--full">
					Start nu jouw bedrijf
				</button>
			</div>
		</form>
	</section>
@endsection