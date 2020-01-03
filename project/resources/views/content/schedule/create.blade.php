<form
		method="POST"
		action="{{ route('floorplan.postcreate', ['event_id' => $event['id'] ]) }}"
		class="popup__content"
		enctype="multipart/form-data"
>
	@csrf
	
	<h1>Voeg een grondplan toe</h1>
	
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. eerste verdieping"
				name="name"
				id="name"
				value="{{ old('name') }}"
		>
		<label for="name" class="form__label">
			Naam van het grondplan
		</label>
	</div>
	
	<div class="form__group">
		<input
				id="image"
				type="file"
				class="form__input @error('logo') is-invalid @enderror"
				name="image"
				value="{{ old('image') }}"
				required
				autocomplete="off"
		>
		
		<label for="image" class="form__label">
			grondplan als afbeelding
		</label>
		
		@error('image')
		<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="row spacing-top-s">
		<button type="button" class="btn" onclick="closeForm('floorplan-form')">Sluiten</button>
		<button type="submit" class="btn btn--full">Grondplan toevoegen</button>
	</div>
</form>