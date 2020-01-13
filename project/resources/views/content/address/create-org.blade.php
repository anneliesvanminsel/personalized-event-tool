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
			<div class="wizard__item active is-blue">
				Adresgegevens
			</div>
			<div class="wizard__item">
				Gebruikergegevens
			</div>
		</div>
	</section>
	<section class="page-alignment spacing-top-m">
		<h1>
			Voeg jouw adresgegevens toe
		</h1>
		<p class="subheading">
			Voeg het adress van het bedrijf <span class="accent is-blue">{{ $organisation['name'] }}</span> toe. <br>
		</p>
		
		<form method="POST" action="{{ route('organisation.address.postcreate', ['organisation_id' => $organisation['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf
			
			<h2 class="spacing-top-m">
				Adresgegevens
			</h2>
			
			<div class="form__group is-blue">
				<input
						id="locationname"
						type="text"
						class="form__input @error('locationname') is-invalid @enderror"
						name="locationname"
						placeholder="bv. Jan Peeters"
						value="{{ old('locationname') }}"
				>
				<label for="locationname" class="form__label">
					Naam van de locatie
				</label>
				
				@error('locationname')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group is-blue">
				<input
						id="street"
						type="text"
						class="form__input @error('street') is-invalid @enderror"
						name="street"
						placeholder="bv. Jan Peeters"
						value="{{ old('street') }}"
						required
				>
				<label for="street" class="form__label">
					Straatnaam
				</label>
				
				@error('street')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="row row--stretch">
				<div class="form__group is-blue">
					<input
							id="streetnumber"
							type="text"
							class="form__input @error('streetnumber') is-invalid @enderror"
							name="streetnumber"
							placeholder="bv. Jan Peeters"
							value="{{ old('streetnumber') }}"
							required
					>
					<label for="streetnumber" class="form__label">
						Nummer
					</label>
					
					@error('streetnumber')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="form__group is-blue">
					<input
							id="box"
							type="text"
							class="form__input @error('box') is-invalid @enderror"
							name="box"
							placeholder="bv. Jan Peeters"
							value="{{ old('box') }}"
					>
					<label for="box" class="form__label">
						Bus
					</label>
					
					@error('box')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="form__group is-blue">
				<input
						id="zipcode"
						type="text"
						class="form__input @error('zipcode') is-invalid @enderror"
						name="zipcode"
						placeholder="bv. Jan Peeters"
						value="{{ old('zipcode') }}"
						required
				>
				<label for="zipcode" class="form__label">
					Postcode
				</label>
				
				@error('zipcode')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group is-blue">
				<input
						id="city"
						type="text"
						class="form__input @error('city') is-invalid @enderror"
						name="city"
						placeholder="bv. Jan Peeters"
						value="{{ old('city') }}"
						required
				>
				<label for="city" class="form__label">
					Gemeente
				</label>
				
				@error('city')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group is-blue">
				<input
						id="region"
						type="text"
						class="form__input @error('region') is-invalid @enderror"
						name="region"
						placeholder="bv. Jan Peeters"
						value="{{ old('region') }}"
				>
				<label for="region" class="form__label">
					Regio
				</label>
				
				@error('region')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<select class="select is-large" id="country" name="country">
					<option value="België">-- Kies je land --</option>
					<option value="België">België</option>
				</select>
				
				<label for="country" class="form__label">
					Land
				</label>
				
				@error('country')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			
			<div class="form__group is-blue">
				<input
						id="googleframe"
						type="text"
						class="form__input @error('googleframe') is-invalid @enderror"
						name="googleframe"
						placeholder="bv. Jan Peeters"
						value="{{ old('googleframe') }}"
				>
				<label for="googleframe" class="form__label">
					Google Maps iFrame
				</label>
				
				@error('googleframe')
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