<form
		method="POST"
		action="{{ route('ticket.postcreate', ['event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
		class="popup__content"
>
	@csrf
	
	<h1>Voeg een ticket toe</h1>
	
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. daypazz"
				name="name"
				id="name"
				value="{{ $ticket['name'] }}"
		>
		<label for="name" class="form__label">
			Naam van het ticket
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
				value="{{ $ticket['price'] }}"
		>
		<label for="price" class="form__label">
			Prijs van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. combiticket, dagticket"
				name="type"
				id="type"
				value="{{ $ticket['type'] }}"
		>
		<label for="type" class="form__label">
			Type van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="number"
				min="0"
				placeholder="Bv. 200, 150, 25, ..."
				name="totaltickets"
				id="totaltickets"
				value="{{ $ticket['totaltickets'] }}"
		>
		<label for="totaltickets" class="form__label">
			Totaal aantal tickets
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="date"
				placeholder="{{ $event['date'] }}"
				name="date"
				id="date"
				required
				value="{{ $ticket['date'] }}"
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
				value="{{ $ticket['description'] }}"
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
	
	<div class="row spacing-top-m">
		<button type="button" class="btn">Sluiten</button>
		<button type="submit" class="btn btn--full">Ticket aanmaken</button>
	</div>
</form>