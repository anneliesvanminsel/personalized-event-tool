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
				<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Grondplan
				</a>
				<a class="nav__item active" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
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
				<a class="btn is-small" href="{{ route('ticket.create', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Voeg een item toe
				</a>
			</div>
			
			@if($event->tickets()->exists())
				<section class="section schedule">
					<div class="card--container has-wrap">
						@foreach($event->tickets()->get() as $ticket)
							<div class="card">
								<div class="card__like">
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $ticket['type'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('ticket.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="button is-icon" type="submit">
											@svg('delete', 'is-btn')
										</button>
									</form>
								</div>
								<div class="card__image">
									@if(File::exists(public_path() . "/images/" . $event['image']))
										<img src="{{ asset('images/' . $event['image']) }}" alt="logo voor {{ $event->title }}">
									@else
										<img src="https://placekitten.com/600/600" alt="logo voor {{ $event->title }}">
									@endif
								</div>
								<div class="card__content">
									@if($ticket['type'])
										<h4 class="card__title">
											{{ $ticket['type'] }}
										</h4>
									@endif
									<div class="card__price">
										€ {{ $ticket['price'] }}
									</div>
									@if($ticket['description'])
										<p class="card__text">
											{{ $ticket['description'] }}
										</p>
									@endif
								</div>
								<div class="card__actions">
									<a href="" class="btn">
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