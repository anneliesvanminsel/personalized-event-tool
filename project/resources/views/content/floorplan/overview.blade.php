@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="section content">
		<h2>
			{{ $event['title'] }}
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
			<div class="row row--center">
				<div class="is-grow" style="position: relative;">
					<div class="nav__item expands">
						<div class="nav__search-icon" role="button" id="nav__search-icon">
							@svg('search')
						</div>
						
						<div id="nav__search-input" style="display: none;">
							<input class="nav__search-input form__input" type="text" placeholder="zoek jouw evenement.." autofocus>
							<button class="close" id="nav__search-close">
								<span class="hidden">sluiten</span>
							</button>
						</div>
					</div>
				</div>
				<a class="btn is-small" href="{{ route('floorplan.create', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Voeg een item toe
				</a>
			</div>
			
			@if($event->floorplans()->exists())
				<section class="section schedule">
					<div class="card--container has-wrap">
						@foreach($event->floorplans()->get() as $floorplan)
							<div class="card">
								<div class="card__like">
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $floorplan['name'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('floorplan.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'floorplan_id' => $floorplan['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="button is-icon" type="submit">
											@svg('delete', 'is-btn')
										</button>
									</form>
								</div>
								<div class="card__image">
									@if(File::exists(public_path() . "/images/" . $floorplan['image']))
										<img src="{{ asset('images/' . $floorplan['image']) }}" alt="logo voor {{ $floorplan->title }}">
									@else
										<img src="https://placekitten.com/600/600" alt="logo voor {{ $floorplan->title }}">
									@endif
								</div>
								<div class="card__content">
									<h4 class="card__title">
										{{ $floorplan['name'] }}
									</h4>
								</div>
								<div class="card__actions">
									<a href="{{ route('floorplan.update', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'floorplan_id' => $floorplan['id'] ]) }}" class="btn">
										bewerken
									</a>
								</div>
							</div>
						@endforeach
					</div>
				</section>
			@endif
		</div>
	</div>
@endsection