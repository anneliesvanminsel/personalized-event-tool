@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="content">
		<h2>
			evenement aanmaken
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<p class="nav__item tab__links active">
					evenement gegevens
				</p>
				@if( $organisation->subscription_id === 3 )
					<p class="nav__item tab__links">
						personalisatiegegevens
					</p>
				@endif
				<p class="nav__item tab__links">
					adresgegevens
				</p>
			</div>
		</div>
		
		<form
			method="POST"
			id="form-create"
			action="{{ route('event.postcreate', ['organisation_id' => $organisation->id]) }}"
			class="form"
			enctype="multipart/form-data"
		>
			@csrf
			
			<div class="form__group">
				<input
					id="title"
					type="text"
					class="form__input @error('title') is-invalid @enderror"
					name="title"
					placeholder="bv. Rock Werchter of Kerstdrink 2019"
					value="{{ old('title') }}"
					required
					autofocus
					autocomplete="off"
				>
				
				<label for="title" class="form__label">
					De titel van het event
				</label>
				
				@error('title')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<textarea
					form="form-create"
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
					hoofdafbeelding
				</label>
				
				@error('logo')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="starttime"
					type="datetime-local"
					class="form__input @error('starttime') is-invalid @enderror"
					name="starttime"
					placeholder="bv: 12/10/2022"
					value="{{ old('starttime') ? old('starttime') : '03/02/2019' }}"
					required
					autocomplete="off"
				>
				
				<label for="title" class="form__label">
					De begindatum van het evenement
				</label>
				
				@error('starttime')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group spacing-top-s">
				<input
					id="endtime"
					type="datetime-local"
					class="form__input optional @error('endtime') is-invalid @enderror"
					name="endtime"
					placeholder="bv: 14/10/2022"
					value="{{ old('endtime') }}"
					autocomplete="off"
				>
				
				<label for="title" class="form__label">
					De einddatum van het evenement
				</label>
				
				@error('endtime')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group is-select">
				<select class="select is-large" id="type" name="type">
					<option value="not given">-- selecteer evenementstype --</option>
					<option value="conference">conferentie</option>
					<option value="workshop">workshop</option>
					<option value="reunion">reunie</option>
					<option value="party">feest</option>
					<option value="gala">gala</option>
					<option value="festival">festival</option>
					<option value="semenar">semenarie</option>
					<option value="auction">veiling</option>
					<option value="market">beurs</option>
				</select>
				<label for="type" class="form__label">
					evenementstype
				</label>
				
				@error('type')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
			
			<div class="form__group">
				<input
					id="ig-username"
					type="text"
					class="form__input optional @error('ig-username') is-invalid @enderror"
					name="ig-username"
					placeholder="Bv. event_platform"
					value="{{ old('ig-username') }}"
				>
				
				<label for="ig-username" class="form__label">
					Instagram-username
				</label>
				
				@error('ig-username')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="spacing-top-m row row--center">
				<a href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}" class="btn is-cancel">
					annuleren
				</a>
				
				<button type="submit" class="btn btn--full">
					Maak het evenement aan
				</button>
			</div>
		</form>
	</section>
@endsection