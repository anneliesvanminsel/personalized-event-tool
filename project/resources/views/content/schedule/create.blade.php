<form
		method="POST"
		action="{{ route('schedule.postcreate', ['event_id' => $event['id']] ) }}"
		class="popup__content"
		enctype="multipart/form-data"
		id="schedule-create-form"
>
	@csrf
	
	<h1>Voeg een item aan jouw planning toe</h1>
	
	<div class="form__group">
		<select class="select" id="schedule-create-sessionid" name="schedule-create-sessionid">
			@foreach($event->sessions()->get() as $session)
				<option value="{{$session['id']}}">{{  date('d/m', strtotime( $session['date'])) }}</option>
			@endforeach
		</select>
		<label for="schedule-create-sessionid" class="form__label">
			Selecteer de dag waaraan je dit wilt toevoegen
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. eerste verdieping"
				name="schedule-create-title"
				id="schedule-create-title"
				maxlength="255"
				required
				autofocus
				value="{{ old('schedule-create-title') }}"
		>
		<label for="schedule-create-title" class="form__label">
			Titel
		</label>
		@error('schedule-create-title')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<textarea
			form="schedule-create-form"
			id="schedule-create-description"
			class="form__input"
			name="schedule-create-description"
			placeholder="Een korte beschrijving van wat planning item inhoudt."
			maxlength="1000"
		>{{ old('schedule-create-description') }}</textarea>
		
		<label for="schedule-create-description" class="form__label">
			Korte beschrijving
		</label>
		
		@error('schedule-create-description')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
		
		<div id="word-counter" class="form__label is-counter"></div>
		
		<script>
            document.getElementById('schedule-create-description').onkeyup = function () {
                document.getElementById('word-counter').innerHTML = this.value.length + "/1000";
            };
		</script>
	</div>
	
	<div class="form__group">
		<input
				id="schedule-create-starttime"
				type="time"
				class="form__input"
				name="schedule-create-starttime"
				placeholder="bv: 12/10/2022"
				value="{{ old('schedule-create-starttime') }}"
				required
				autocomplete="off"
		>
		
		<label for="schedule-create-starttime" class="form__label">
			Startuur
		</label>
		@error('schedule-create-starttime')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group spacing-top-s">
		<input
				id="schedule-create-endtime"
				type="time"
				class="form__input"
				name="schedule-create-endtime"
				placeholder="bv: 14/10/2022"
				value="{{ old('schedule-create-endtime') }}"
				autocomplete="off"
		>
		
		<label for="schedule-create-endtime" class="form__label">
			Einduur
		</label>
		@error('schedule-create-endtime')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. eerste verdieping"
				name="schedule-create-location"
				id="schedule-create-location"
				maxlength="255"
				value="{{ old('schedule-create-location') }}"
		>
		<label for="schedule-create-location" class="form__label">
			Plaats / locatie
		</label>
		@error('schedule-create-location')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<input
				id="image"
				type="file"
				class="form__input"
				name="image"
		>
		
		<label for="image" class="form__label">
			Afbeelding
		</label>
		@error('image')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="row spacing-top-s">
		<button type="button" class="btn" onclick="closeForm('schedule-create-form')">Sluiten</button>
		<button type="submit" class="btn btn--full">Item aan de planning toevoegen</button>
	</div>
</form>