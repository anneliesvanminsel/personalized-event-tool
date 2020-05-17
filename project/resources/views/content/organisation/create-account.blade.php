@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<div class="section with-space-top">
		<div class="section__nav nav">
			<div class="nav__tabs">
				<p class="nav__item tab__links active">
					gebruikersgegevens
				</p>
				<p class="nav__item tab__links">
					organisatie gegevens
				</p>
				<p class="nav__item tab__links">
					adresgegevens
				</p>
			</div>
		</div>
		
		<div class="section account">
			<section class="content is-right">
				<form method="POST" action="{{ route('organisation.postcreate', ['subscription_id' => $subscription['id']]) }}">
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
							Sla deze gebruikersgegevens op
						</button>
					</div>
				</form>
			</section>
			
			
			<section class="sidebar is-left">
				<h3 class="sidebar__title">
					Beste klant,
				</h3>
				
				<div class="sidebar__section">
					<div class="sidebar__item">
						Je hebt gekozen voor het {{ $subscription['title'] }} abonnement.
						Voeg hier de gegevens toe waarmee je je wilt aanmelden.
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