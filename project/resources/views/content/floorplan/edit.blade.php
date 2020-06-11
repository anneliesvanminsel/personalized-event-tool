@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="section content">
		<h2>
			{{ $event['title'] }} - bewerk grondplan
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<a class="nav__item" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				<a class="nav__item active" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Grondplan
				</a>
				<a class="nav__item" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Ticket
				</a>
				<a class="nav__item" href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Berichten
				</a>
			</div>
		</div>
		
		<div id="tab__container">
			<form
					method="POST"
					action="{{ route('floorplan.postupdate', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'floorplan_id' => $current_floorplan['id'] ]) }}"
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
							value="{{ $current_floorplan['name'] }}"
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
							accept=".jpeg,.png,.jpg"
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
				
				<div class="row in-form">
					<a class="btn is-cancel" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Sluiten
					</a>
					<button type="submit" class="btn btn--full">Grondplan bewerken</button>
				</div>
			</form>
		</div>
	</div>
@endsection