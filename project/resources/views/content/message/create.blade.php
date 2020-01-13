<form
		method="POST"
		action="{{ route('message.postcreate', ['event_id' => $event['id'] ]) }}"
		class="popup__content"
		enctype="multipart/form-data"
>
	@csrf
	
	<h1>Voeg een bericht toe</h1>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="Titel van het bericht"
				name="title"
				id="title"
				value="{{ old('title') }}"
		>
		<label for="name" class="form__label">
			Titel
		</label>
		@error('title')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="Inhoud van het bericht"
				name="message"
				id="message"
				value="{{ old('message') }}"
				required
		>
		<label for="name" class="form__label">
			Bericht
		</label>
		@error('message')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<input
				id="image"
				type="file"
				class="form__input @error('image') is-invalid @enderror"
				name="image"
				value="{{ old('image') }}"
		>
		
		<label for="image" class="form__label">
			afbeelding
		</label>
		
		@error('image')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
		@enderror
	</div>
	
	<div class="form__group">
		<select class="select is-large" id="type" name="type">
			<option value="default">-- selecteer berichtstype --</option>
			<option value="default">standaard / gewoon</option>
			<option value="important">belangrijk</option>
			<option value="warning">gevaar</option>
			<option value="information">informatie</option>
		</select>
		<label for="type" class="form__label">
			berichttype
		</label>
		
		@error('type')
			<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
		@enderror
	</div>
	
	<div class="row spacing-top-s">
		<button type="button" class="btn" onclick="closeForm('message-form')">Sluiten</button>
		<button type="submit" class="btn btn--full">Bericht toevoegen</button>
	</div>
</form>