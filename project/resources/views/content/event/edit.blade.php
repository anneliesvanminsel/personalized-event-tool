@extends('layouts.masterlayout')
@section('title')
	evento - edit event
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Bewerk {{ $event['title'] }}
		</h1>

		<form method="POST" id="form-edit" action="{{ route('event.postupdate', ['event_id' => $event['id']]) }}" class="form" enctype="multipart/form-data">
			@csrf

			<h2 class="spacing-top-m">
				1. Algemene gegevens
			</h2>

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
					class="form__input @error('logo') is-invalid @enderror"
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
						id="starttime"
						type="date"
						class="form__input @error('starttime') is-invalid @enderror"
						name="starttime"
						placeholder="bv: 12/10/2022"
						value="{{ $event['starttime'] }}"
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
			<p class="spacing-top-s">
				Wanneer het evenement op meerdere dagen valt, kan je hieronder de laatste dag van het evenement noteren.
			</p>
			
			<div class="form__group spacing-top-s">
				<input
						id="endtime"
						type="date"
						class="form__input @error('endtime') is-invalid @enderror"
						name="endtime"
						placeholder="bv: 14/10/2022"
						value="{{ $event['endtime'] }}"
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
			
			
			<h2 class="spacing-top-m">
				2. Technische informatie
			</h2>

			<div class="form__group">
				<select class="select" id="eventtype" name="eventtype">
					<option value="{{ $event['type'] }}">{{ $event['type'] }}</option>
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

				<label for="eventtype" class="form__label">
					evenementstype
				</label>

				@error('eventtype')
				<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<h2 class="spacing-top-m">
				3. Opmaak mogelijkheden
			</h2>
			<p>
				Hier zal je de evenementspagina kunnen personaliseren. Deze kleuren zullen in de applicatie en op de website terugkomen.
				<br>
				Gelieve deze te noteren in <span class="accent">hex-notatie.</span>
			</p>

			<div class="form__group spacing-top-s">
				<input
					id="bkgcolor"
					type="text"
					class="form__input @error('bkgcolor') is-invalid @enderror"
					name="bkgcolor"
					placeholder="bv. #112233"
					value="{{ $event['bkgcolor'] }}"
					autocomplete="off"
				>

				<label for="bkgcolor" class="form__label">
					Achtergrondkleur
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
					value="{{ $event['textcolor'] }}"
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


			<div class="spacing-top-m">
				<button type="submit" class="btn btn--full">
					Sla wijzigingen op
				</button>
			</div>
		</form>
	</section>
@endsection