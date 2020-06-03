@extends('layouts.organisation')
@section('title')
	evento - maak event
@endsection
@section('content')
	<div class="section content">
		<h2>
			{{ $event['title'] }} - ticket {{ $current_ticket['type'] }} bewerken
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
			<form
				method="POST"
				action="{{ route('ticket.postupdate', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'], 'ticket_id' => $current_ticket['id'] ]) }}"
			>
				@csrf
				
				<div class="form__group">
					<input
						type="text"
						placeholder="bv. combiticket, dagticket"
						name="type"
						id="type"
						value="{{ $current_ticket['type'] }}"
					>
					<label for="type" class="form__label">
						Type van het ticket
					</label>
				</div>
				
				<div class="form__group">
					<input
						type="number"
						step="0.01"
						min="0"
						placeholder="bv. 19.99"
						name="price"
						id="price"
						required
						value="{{ $current_ticket['price'] }}"
					>
					<label for="price" class="form__label">
						Prijs van het ticket
					</label>
				</div>
				
				<div class="form__group">
					<input
						type="number"
						min="0"
						placeholder="Bv. 200, 150, 25, ..."
						name="totaltickets"
						id="totaltickets"
						value="{{ $current_ticket['totaltickets'] }}"
					>
					<label for="totaltickets" class="form__label">
						Totaal aantal tickets
					</label>
				</div>
				
				<div class="form__group">
					<input
						type="date"
						name="date"
						id="date"
						required
						value="{{ $current_ticket['date'] }}"
					>
					<label for="date" class="form__label">
						Datum van het ticket
					</label>
				</div>
				
				<div class="form__group">
					<input
						type="text"
						placeholder="Zaken die inbegrepen zijn in het ticket"
						name="description"
						id="description"
						required
						value="{{ $current_ticket['description'] }}"
					>
					<label for="description" class="form__label">
						Beschrijving of extra informatie van het ticket
					</label>
					<div id="word-counter" class="form__label is-counter"></div>
				</div>
				
				<script>
                    document.getElementById('description').onkeyup = function () {
                        document.getElementById('word-counter').innerHTML = this.value.length + "/255";
                    };
				</script>
				
				<div class="row in-form">
					<a class="btn is-cancel" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Sluiten
					</a>
					<button type="submit" class="btn btn--full">
						Ticket bewerken
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection
