@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<div class="section with-space-top">
		<div class="section__nav nav">
			<div class="nav__tabs">
				<p class="nav__item tab__links">
					gebruikersgegevens
				</p>
				<p class="nav__item tab__links">
					organisatie gegevens
				</p>
				<p class="nav__item tab__links active">
					adresgegevens
				</p>
			</div>
		</div>
		
		<div class="section account">
			<section class="content is-right">
				<form method="POST" action="{{ route('organisation.address.postcreate', ['subscription_id' => $subscription['id'], 'organisation_id' => $organisation['id'] ]) }}" class="form" enctype="multipart/form-data">
					@csrf
					
					<h2 class="spacing-top-m">
						Adresgegevens toevoegen
					</h2>
					
					<div class="form__group">
						<input
							id="locationname"
							type="text"
							class="form__input optional @error('locationname') is-invalid @enderror"
							name="locationname"
							placeholder="bv. 300CC, Begijnenhof, Zaal Rosa"
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
					
					<div class="form__group">
						<input
							id="street"
							type="text"
							class="form__input @error('street') is-invalid @enderror"
							name="street"
							placeholder="bv. Tervuursesteenweg"
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
					
					<div class="row row--stretch in-form">
						<div class="form__group  ">
							<input
								id="streetnumber"
								type="text"
								class="form__input @error('streetnumber') is-invalid @enderror"
								name="streetnumber"
								placeholder="huisnummer"
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
						
						<div class="form__group  ">
							<input
								id="box"
								type="text"
								class="form__input optional @error('box') is-invalid @enderror"
								name="box"
								placeholder="busnummer"
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
					
					<div class="form__group">
						<input
							id="zipcode"
							type="text"
							class="form__input @error('zipcode') is-invalid @enderror"
							name="zipcode"
							placeholder="tussen 1000 en 9999"
							value="{{ old('zipcode') }}"
							required
							min="1000"
							max="9999"
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
					
					<div class="form__group">
						<input
							id="city"
							type="text"
							class="form__input @error('city') is-invalid @enderror"
							name="city"
							placeholder="Bv. Leuven, Brussel, etc."
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
					
					<div class="form__group">
						<input
							id="region"
							type="text"
							class="form__input optional @error('region') is-invalid @enderror"
							name="region"
							placeholder="Bv. Vlaams-Brabant"
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
					
					<div class="form__group is-select">
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
					
					<div class="form__group  ">
						<input
							id="googleframe"
							type="text"
							class="form__input optional @error('googleframe') is-invalid @enderror"
							name="googleframe"
							placeholder="Deel locatie van Google, klik op insluiten."
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
					
					
					<div class="row row--center in-form">
						<a href="{{ route('index') }}" class="btn is-cancel">
							annuleren
						</a>
						
						<button type="submit" class="btn btn--full">
							Voeg het adres toe
						</button>
					</div>
				</form>
			</section>
			
			
			<section class="sidebar is-left">
				<h3 class="sidebar__title">
					Abonnement {{ $subscription['title'] }}
				</h3>
				
				<div class="sidebar__section">
					<div class="sidebar__item">
						Je hebt gekozen voor het {{ $subscription['title'] }} abonnement.
					</div>
				</div>
				<div class="sidebar__section">
					<div class="sidebar__item row">
						<p class="is-grow">
							<b>
								Toelage per ticket:
							</b>
						</p>
						<p>
							€ {{ $subscription['price'] }}
						</p>
					</div>
				</div>
				
				<div class="">
					<ul class="ul">
						{!! $subscription->items !!}
					</ul>
				</div>
			</section>
		</div>
	
	</div>

@endsection