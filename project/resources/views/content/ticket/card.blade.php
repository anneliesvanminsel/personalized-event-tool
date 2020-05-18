<div class="card is-ticket">
	@php
		$event = $ticket->event()->first();
		$attendance = $ticket->users()->findOrFail(Auth::user()->id, ['user_id'])->pivot->attendance;
	
	@endphp
	<div class="card__like">
		@if($attendance === 1)
			@svg('tick', 'is-check is-green is-small')
		@endif
	</div>
	<div class="card__image is-ticket">
		@if(File::exists(public_path() . "/images/" . $event['image']))
			<img src="{{ asset('images/' . $event['image']) }}" alt="logo voor {{ $event->title }}">
		@else
			<img src="https://placekitten.com/600/600" alt="logo voor {{ $event->title }}">
		@endif
		<div class="card__name">
			{{ $ticket->type }}
		</div>
	</div>
	<div class="card__content">
		<h4 class="card__title">
			{{ $event->title }}
		</h4>
		<div class="card__text row">
			@svg('calendar')
			{{ \Jenssegers\Date\Date::parse(strtotime( $ticket->date ))->format('j F Y') }}
		</div>
		@if($event->address()->exists())
			<div class="card__text row is-short">
				@svg('location')
				<span>
					{{ $event->address()->first()->city }}
				</span>
			</div>
		@endif
	</div>
	<div class="card__actions">
		<a
			class="btn"
			href="{{ route('ticket.detail', [ 'ticket_id' => $ticket['id'], 'event' => $ticket['event_id'] ]) }}"
		>
			Ticket details
		</a>
	</div>
</div>