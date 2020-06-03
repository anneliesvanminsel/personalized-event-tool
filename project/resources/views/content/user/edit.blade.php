@extends('layouts.masterlayout')
@section('name')
	evento - account bewerken
@endsection
@section('content')
	<div class="section account with-space-top">
		@include('partials.account-sidebar')
		
		<section class="content">
			<h2>
				Bewerk jouw account gegevens
			</h2>
			<form
				method="POST"
				action="{{ route('user.postedit', ['user_id' => $user['id']] ) }}"
				class="form"
				enctype="multipart/form-data"
				id="form"
			>
				@csrf
				
				<div class="form__group">
					<input
						type="text"
						placeholder="Voornaam Achternaam"
						name="name"
						class="form__input"
						id="name"
						maxlength="255"
						autofocus
						value="{{ $user->name }}"
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
						type="email"
						placeholder="jan.peeters@mail.be"
						class="form__input is-disabled"
						name="email"
						id="email"
						disabled
						value="{{ $user->email }}"
					>
					<label for="name" class="form__label">
						Email
					</label>
					
					@error('email')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="birthday"
						type="date"
						class="form__input is-optional"
						name="birthday"
						placeholder="bv: 12/10/2022"
						value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}"
					>
					
					<label for="birthday" class="form__label">
						Geboortedatum
					</label>
					
					@error('birthday')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						type="text"
						placeholder="Telefoonnummer"
						name="phonenumber"
						class="form__input"
						id="phonenumber"
						maxlength="255"
						value="{{ $user->phonenumber }}"
					>
					<label for="name" class="form__label">
						Telefoonnummer
					</label>
					
					@error('phonenumber')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="row spacing-top-s in-form">
					<a class="btn is-cancel" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}">
						Sluiten
					</a>
					<button type="submit" class="btn btn--full">
						Wijzigingen opslaan
					</button>
				</div>
			</form>
		</section>
	</div>
@endsection