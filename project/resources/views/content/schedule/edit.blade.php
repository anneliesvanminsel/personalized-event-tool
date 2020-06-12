@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="section content">
		<h2>
			{{ $event['title'] }} - bewerk het item
		</h2>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<a class="nav__item active" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				@if($organisation->subscription_id === 2 || $organisation->subscription_id === 3)
					<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Grondplan
					</a>
				@endif
				<a class="nav__item" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Ticket
				</a>
				@if($organisation->subscription_id === 2 || $organisation->subscription_id === 3)
					<a class="nav__item" href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Berichten
					</a>
				@endif
			</div>
		</div>
		
		<div id="tab__container">
			<form
				method="POST"
				action="{{ route('schedule.postupdate', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], '' => $sched['id']] ) }}"
				class="form"
				enctype="multipart/form-data"
				id="form"
			>
				@csrf
				
				<div class="form__group is-select">
					<select class="select is-large" id="session_id" name="session_id">
						@foreach($event->sessions()->get() as $session)
							<option value="{{$session['id']}}">{{  date('d/m', strtotime( $session['date'])) }}</option>
						@endforeach
					</select>
					<label for="session_id" class="form__label">
						Selecteer de dag waaraan je dit wilt toevoegen
					</label>
				</div>
				
				<div class="form__group">
					<input
						type="text"
						placeholder="bv. eerste verdieping"
						name="title"
						id="title"
						maxlength="255"
						required
						autofocus
						value="{{ $sched->title }}"
					>
					<label for="title" class="form__label">
						Titel
					</label>
					@error('title')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<textarea
						form="form"
						id="description"
						class="form__input optional"
						name="description"
						placeholder="Een korte beschrijving van wat planning item inhoudt."
						maxlength="1000"
					>{{ $sched->description }}</textarea>
					
					<label for="description" class="form__label">
						Korte beschrijving
					</label>
					
					@error('description')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					
					<div id="word-counter" class="form__label is-counter"></div>
					
					<script>
                        document.getElementById('description').onkeyup = function () {
                            document.getElementById('word-counter').innerHTML = this.value.length + "/1000";
                        };
					</script>
				</div>
				
				<div class="form__group">
					<input
						id="starttime"
						type="time"
						class="form__input"
						name="starttime"
						value="{{ $sched->starttime }}"
						required
						autocomplete="off"
					>
					
					<label for="starttime" class="form__label">
						Startuur
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
						type="time"
						class="form__input optional"
						name="endtime"
						value="{{ $sched->endtime }}"
						autocomplete="off"
					>
					
					<label for="endtime" class="form__label">
						Einduur
					</label>
					@error('endtime')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						type="text"
						placeholder="bv. eerste verdieping"
						name="location"
						id="location"
						class="form__input optional"
						maxlength="255"
						value="{{ $sched->location }}"
					>
					<label for="location" class="form__label">
						Plaats / locatie
					</label>
					@error('location')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="form__group">
					<input
						id="logo"
						name="logo"
						type="file"
						class="form__input optional"
						accept=".jpeg,.png,.jpg"
					>
					
					<label for="logo" class="form__label">
						Afbeelding
					</label>
					@error('logo')
					<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				
				<div class="row row--center in-form">
					<a class="btn is-cancel">
						Sluiten
					</a>
					<button type="submit" class="btn btn--full">
						Item aan de planning toevoegen
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection