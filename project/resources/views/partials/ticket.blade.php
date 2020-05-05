<div class="card ticket">
	<div class="card__content ticket__content">
		@if($ticket['type'])
			<div class="ticket__type">
				{{ $ticket['name'] }}
			</div>
		@endif
		<div class="card__price ticket__price">
			€ {{ $ticket['price'] }}
		</div>
		@if($ticket['description'])
			<p class="card__text ticket__description">
				{{ $ticket['description'] }}
			</p>
		@endif
	
	</div>
	
	<div class="card__actions ticket__actions">
		<a
			href="{{ route('ticket.payment', ['event_id' => $event['id'], 'ticket_id' => $ticket['id']]) }}"
			class="btn btn--primary"
		>
			Koop dit ticket
		</a>
	</div>
</div>