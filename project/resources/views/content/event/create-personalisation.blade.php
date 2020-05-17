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
				<p class="nav__item tab__links">
					evenement gegevens
				</p>
				<p class="nav__item tab__links active">
					personalisatiegegevens
				</p>
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
					id="prim-color"
					type="color"
					class="form__input @error('prim-color') is-invalid @enderror"
					name="prim-color"
					placeholder="bv. #effeff"
					value="{{ old('prim-color') ? old('prim-color') : '#ffffff'  }}"
					required
					autofocus
					autocomplete="off"
					onchange="changeColor('prim-color')"
				>
				
				<label for="prim-color" class="form__label">
					Hoofdkleur
				</label>
				
				<div class="color" id="prim-color-div">
					#ffffff
				</div>
				
				@error('prim-color')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
				
				
			</div>
			
			<div class="form__group">
				<input
					id="sec-color"
					type="color"
					class="form__input optional @error('sec-color') is-invalid @enderror"
					name="sec-color"
					placeholder="bv. #effeff"
					value="{{ old('sec-color') ? old('sec-color') : '#ffffff'  }}"
					required
					autofocus
					autocomplete="off"
					onchange="changeColor('sec-color')"
				>
				
				<label for="sec-color" class="form__label">
					Secundaire kleur
				</label>
				
				<div class="color" id="sec-color-div">
					#ffffff
				</div>
				
				@error('sec-color')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			
			<div class="form__group">
				<input
					id="tert-color"
					type="color"
					class="form__input optional @error('tert-color') is-invalid @enderror"
					name="tert-color"
					placeholder="bv. #effeff"
					value="{{ old('tert-color') ? old('tert-color') : '#ffffff'  }}"
					required
					autofocus
					autocomplete="off"
					onchange="changeColor('tert-color')"
				>
				
				<label for="sec-color" class="form__label">
					tertiare kleur
				</label>
				
				<div class="color" id="tert-color-div">
					#ffffff
				</div>
				
				@error('tert-color')
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
					required
					autofocus
					autocomplete="off"
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
	<script>
        function changeColor(el) {
            const color = document.getElementById(el).value;
            document.getElementById( el + "-div").innerHTML = color;
        }
	</script>
@endsection