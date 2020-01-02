<form
		method="POST"
		action="{{ route('ticket.postupdate', ['event_id' => $event['id'], 'ticket_id' => $current_ticket['id'] ]) }}"
		class="popup__content"
>
	@csrf
	
	<h1>Ticket bewerken</h1>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. daypazz"
				name="ticket-edit-name"
				id="ticket-edit-name"
				value="{{ $current_ticket['name'] }}"
		>
		<label for="ticket-edit-name" class="form__label">
			Naam van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="number"
				step="0.01"
				min="0"
				placeholder="bv. 19.99"
				name="ticket-edit-price"
				id="ticket-edit-price"
				required
				value="{{ $current_ticket['price'] }}"
		>
		<label for="ticket-edit-price" class="form__label">
			Prijs van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. combiticket, dagticket"
				name="ticket-edit-type"
				id="ticket-edit-type"
				value="{{ $current_ticket['type'] }}"
		>
		<label for="ticket-edit-type" class="form__label">
			Type van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="number"
				min="0"
				placeholder="Bv. 200, 150, 25, ..."
				name="ticket-edit-totaltickets"
				id="ticket-edit-totaltickets"
				value="{{ $current_ticket['totaltickets'] }}"
		>
		<label for="ticket-edit-totaltickets" class="form__label">
			Totaal aantal tickets
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="date"
				placeholder="{{ $event['date'] }}"
				name="ticket-edit-date"
				id="ticket-edit-date"
				required
				value="{{ $current_ticket['date'] }}"
		>
		<label for="ticket-edit-date" class="form__label">
			Datum van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="Zaken die inbegrepen zijn in het ticket"
				name="ticket-edit-description"
				id="ticket-edit-description"
				required
				value="{{ $current_ticket['description'] }}"
		>
		<label for="ticket-edit-description" class="form__label">
			Beschrijving of extra informatie van het ticket
		</label>
		<div id="ticket-edit-word-counter" class="form__label is-counter"></div>
	
	</div>
	
	<script>
        document.getElementById('ticket-edit-description').onkeyup = function () {
            document.getElementById('ticket-edit-word-counter').innerHTML = this.value.length + "/255";
        };
	</script>
	
	<div class="row spacing-top-m">
		<button type="button" class="btn" onclick="closeForm('ticket-edit-form-{{$loop->iteration}}')">Sluiten</button>
		<button type="submit" class="btn btn--full">Wijzigingen opslaan</button>
	</div>
</form>