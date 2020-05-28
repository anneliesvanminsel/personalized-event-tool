@extends('layouts.organisation')
@section('title')
	evento - bewerken
@endsection
@section('content')
	<section class="content">
		<h2>
			Bewerk {{ $event['title'] }}
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
		
		<form method="POST" id="form-edit" action="{{ route('event.postupdate', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf
			
			<div class="form__group">
				<input
					id="title"
					type="text"
					class="form__input @error('title') is-invalid @enderror"
					name="title"
					placeholder="bv. Rock Werchter of Kerstdrink 2019"
					value="{{ $event['title'] }}"
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
					form="form-edit"
					id="description"
					type="text"
					class="form__input @error('description') is-invalid @enderror"
					name="description"
					placeholder="bv. het event van de eeuw"
					required
					autocomplete="off"
					maxlength="1000"
				>{{ $event['description'] }}</textarea>
				
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
					class="form__input optional @error('logo') is-invalid @enderror"
					name="logo"
					placeholder="bv. het event van de eeuw"
					value="{{ $event['logo'] }}"
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
					id="startdate"
					type="date"
					class="form__input @error('startdate') is-invalid @enderror"
					name="startdate"
					placeholder="bv: 12/10/2022"
					value="{{ \Carbon\Carbon::parse($event['startdate'])->format('Y-m-d') }}"
					required
					autocomplete="off"
				>
				
				<label for="startdate" class="form__label">
					De begindatum van het evenement
				</label>
				
				@error('startdate')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group spacing-top-s">
				<input
					id="enddate"
					type="date"
					class="form__input optional @error('enddate') is-invalid @enderror"
					name="enddate"
					placeholder="bv: 14/10/2022"
					value="{{ \Carbon\Carbon::parse($event['enddate'])->format('Y-m-d') }}"
					autocomplete="off"
				>
				
				<label for="enddate" class="form__label">
					De einddatum van het evenement
				</label>
				
				@error('enddate')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			
			<div class="form__group is-select">
				<select class="select is-large" id="type" name="type">
					<option value="{{ $event['category'] }}">{{ $event['category'] }}</option>
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
			<div class="spacing-top-m row row--center">
				<a href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}" class="btn is-cancel">
					annuleren
				</a>
				
				<button type="submit" class="btn btn--full">
					Bewerk de gegevens
				</button>
			</div>
		</form>
	</section>
@endsection