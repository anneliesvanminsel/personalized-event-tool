<form
	method="POST"
	action="{{ route('ticket.postcreate', ['event_id' => $event['id'] ]) }}"
	class="popup__content"
>
	@csrf
	
	<h1>Voeg een ticket toe</h1>
	
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. daypazz"
				name="ticket-create-name"
				id="ticket-create-name"
				value="{{ old('ticket-create-name') }}"
		>
		<label for="ticket-create-name" class="form__label">
			Naam van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="number"
				step="0.01"
				min="0"
				placeholder="bv. 19,99"
				name="ticket-create-price"
				id="ticket-create-price"
				required
				value="{{ old('ticket-create-price') }}"
		>
		<label for="ticket-create-price" class="form__label">
			Prijs van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="bv. combiticket, dagticket"
				name="ticket-create-type"
				id="ticket-create-type"
				value="{{ old('ticket-create-type') }}"
		>
		<label for="ticket-create-type" class="form__label">
			Type van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="number"
				min="0"
				placeholder="Bv. 200, 150, 25, ..."
				name="ticket-create-totaltickets"
				id="ticket-create-totaltickets"
				value="{{ old('ticket-create-totaltickets') }}"
		>
		<label for="ticket-create-totaltickets" class="form__label">
			Totaal aantal tickets
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="date"
				placeholder="{{ $event['starttime'] }}"
				name="ticket-create-date"
				id="ticket-create-date"
				required
				value="{{ $event['starttime'] }}"
		>
		<label for="ticket-create-date" class="form__label">
			Datum van het ticket
		</label>
	</div>
	
	<div class="form__group">
		<input
				type="text"
				placeholder="Zaken die inbegrepen zijn in het ticket"
				name="ticket-create-description"
				id="ticket-create-description"
				required
				value="{{ old('ticket-create-description') }}"
		>
		<label for="ticket-create-description" class="form__label">
			Beschrijving of extra informatie van het ticket
		</label>
		<div id="ticket-create-word-counter" class="form__label is-counter"></div>
	
	</div>
	
	<script>
        document.getElementById('ticket-create-description').onkeyup = function () {
            document.getElementById('ticket-create-word-counter').innerHTML = this.value.length + "/255";
        };
	</script>
	
	<div class="row spacing-top-s">
		<button type="button" class="btn" onclick="closeForm('ticket-form')">Sluiten</button>
		<button type="submit" class="btn btn--full">Ticket aanmaken</button>
	</div>
</form>