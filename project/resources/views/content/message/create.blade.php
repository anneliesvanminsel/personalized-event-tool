@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="section content">
		<h2>
			{{ $event['title'] }} - voeg een bericht toe
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<a class="nav__item" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Grondplan
				</a>
				<a class="nav__item" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Ticket
				</a>
				<a class="nav__item active" href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Berichten
				</a>
			</div>
		</div>
		
		<div id="tab__container">
			<form
				method="POST"
				action="{{ route('message.postcreate', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]) }}"
				enctype="multipart/form-data"
			>
				@csrf
				
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
						accept=".jpeg,.png,.jpg"
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
				
				<div class="form__group is-select">
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
				
				<div class="row in-form">
					<a
						href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}"
						class="btn is-cancel"
					>
						annuleren
					</a>
					<button type="submit" class="btn btn--full">
						Bericht toevoegen
					</button>
				</div>
			</form>
		</div>
	</div>
	@endsection