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
				<a class="nav__item active" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
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
			
			
			<div class="tab__content table" id="2">
				<div class="row row--center">
					<div class="is-grow">
						@svg('search')
					</div>
					<a class="btn is-small">
						Voeg grondplan toe
					</a>
				</div>
				@if($event->floorplans()->exists())
					<div class="row-grid">
						@foreach($event->floorplans()->get() as $floorplan)
							<div class="row-grid__item item row row--stretch">
								@if($floorplan['name'])
									<div class="item__title">
										{{ $floorplan['name'] }}
									</div>
								@endif
								
								@if(File::exists(public_path() . "/images/" . $floorplan['image']))
									<div class="item__image ctn--image">
										<img src="{{ asset('images/' . $floorplan['image'] ) }}" alt="{{ $floorplan['name'] }}" loading="lazy">
									</div>
								@else
									<div class="item__image ctn--image">
										<img src="https://placekitten.com/600/600" alt="{{ $floorplan['name'] }}" loading="lazy">
									</div>
								@endif
								
								<div class="row">
									<button class="btn is-icon" onclick="openForm('floorplan-edit-form-{{$loop->iteration}}')">
										@svg('edit', 'is-small')
									</button>
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $floorplan['name'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('floorplan.delete', ['event_id' => $event['id'], 'floorplan_id' => $floorplan['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="btn is-icon" type="submit">
											@svg('delete', 'is-small')
										</button>
									</form>
								</div>
							</div>
							<div class="popup" id="floorplan-edit-form-{{$loop->iteration}}">
								@include('content.floorplan.edit', ['current_floorplan' => $floorplan])
							</div>
						@endforeach
					</div>
				@endif
			</div>
			
			<div class="tab__content table" id="3">
				<div class="row row--center">
					<div class="is-grow">
						@svg('search')
					</div>
					<a class="btn is-small">
						Voeg ticket toe
					</a>
				</div>
				@if($event->tickets()->exists())
					<div class="row-grid">
						@foreach($event->tickets()->get() as $ticket)
							<div class="row-grid__item item row row--stretch">
								@if($ticket['name'])
									<div class="item__text has-grow is-title">
										{{ $ticket['name'] }}
									</div>
								@endif
								@if($ticket['type'])
									<div class="item__text">
										{{ $ticket['type'] }}
									</div>
								@endif
								<div class="item__text is-title">
									€ {{ $ticket['price'] }}
								</div>
								@if($ticket['description'])
									<p class="item__text has-grow">
										{{ $ticket['description'] }}
									</p>
								@endif
								<div class="row">
									<button class="btn is-icon" onclick="openForm('ticket-edit-form-{{$loop->iteration}}')">
										@svg('edit', 'is-small')
									</button>
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je {{ $ticket['name'] }} wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('ticket.delete', ['event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="btn is-icon" type="submit">
											@svg('delete', 'is-small')
										</button>
									</form>
								</div>
								<div class="popup" id="ticket-edit-form-{{$loop->iteration}}">
									@include('content.ticket.edit', ['current_ticket' => $ticket])
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
			
			<div class="tab__content table" id="4">
				<div class="row row--center">
					<div class="is-grow">
						@svg('search')
					</div>
					<a class="btn is-small">
						Voeg bericht toe
					</a>
				</div>
				@if($event->messages()->exists())
					<div class="row-grid">
						@foreach($event->messages()->get() as $message)
							<div class="row-grid__item item row row--stretch">
								@if($message['title'])
									<div class="item__text has-grow is-title">
										{{ $message['title'] }}
									</div>
								@endif
								@if($message['type'])
									<div class="item__text">
										{{ $message['type'] }}
									</div>
								@endif
								<div class="item__text is-grow">
									{{ $message['message'] }}
								</div>
								<div class="row">
									<form
										class="form"
										onsubmit="return confirm('Ben je zeker dat je dit bericht wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
										method="POST"
										action="{{ route('message.delete', ['event_id' => $event['id'], 'message_id' => $message['id'] ]) }}"
									>
										{{ csrf_field() }}
										<button class="btn is-icon" type="submit">
											@svg('delete', 'is-small')
										</button>
									</form>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
	<script src="{{ asset('js/popup.js') }}"></script>
	<script src="{{ asset('js/openTabs.js') }}"></script>
	<script>
        ( ()=> {
            const button = document.getElementById('nav__search-icon');
            button.addEventListener('click', () => {
                document.getElementById('nav__search-input').style.display = "block";
            });

            const btn = document.getElementById('nav__search-close');
            btn.addEventListener('click', () => {
                document.getElementById('nav__search-input').style.display = "none";
            });
        })();
	</script>
@endsection