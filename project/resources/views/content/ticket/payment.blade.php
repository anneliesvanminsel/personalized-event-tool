@extends('layouts.masterlayout')
@section('title')
	evento - betalen
@endsection
@section('content')
	<div class="section account with-space-top">
		<section class="content is-right">
			<form method="POST" action="{{ route('ticket.postpayment', ['event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
			      class="form spacing-top-m" enctype="multipart/form-data">
				@csrf
				
				<div class="container">
					<div class="">
						<div class="card__header">
							<h3>
								ticket aankopen
							</h3>
							<div class="tab-content spacing-top-m">
								<div class="form__group">
									<input
										class="form__input"
										type="text"
										name="username"
										placeholder="bv. Jan Peeters"
									>
									<label class="form__label" for="username">
										Naam op de kaart
									</label>
								</div>
								
								<div class="form__group">
									<input type="text" name="cardNumber" placeholder="Jouw kaartnummer"
									       class="form__input"
									>
									
									<label class="form__label" for="cardNumber">
										Kaartnummer
									</label>
								</div>
								
								<div class="form__group">
									<input type="text" name="cardNumber" placeholder="Vervaldatum"
									       class="form__input"
									>
									
									<label class="form__label" for="cardNumber">
										vervaldatum
									</label>
								</div>
								
								<div class="row in-form">
									<a
										href="{{ route('event.detail', ['event_id' => $event['id']]) }}"
										class="btn is-cancel"
									>
										annuleren
									</a>
									<button type="submit" class="btn">
										Betalen
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</section>
		<section class="sidebar is-left">
			<h3 class="sidebar__title">
				{{ $ticket['type'] }}
			</h3>
			
			<div class="sidebar__section">
				<div class="sidebar__item">
					Je hebt gekozen voor een ticket '{{ $ticket['type'] }}' van {{ $event['title'] }}.
					<br>
					<br>
					Na betaling zal het ticket in uw account op de website of via tickets in uw applicatie te vinden zijn.
					<br>
					<br>
					U kunt niet afzien van de aankoop van het ticket.
				</div>
			</div>
			
			<div class="sidebar__section">
				<div class="sidebar__item row">
					<p class="is-grow">
						<b>
							Prijs:
						</b>
					</p>
					<p>
						€ {{ $ticket['price'] }}
					</p>
				</div>
				<div class="sidebar__item row">
					<p class="is-grow">
						<b>
							datum:
						</b>
					</p>
					<p>
						{{ \Jenssegers\Date\Date::parse(strtotime( $ticket->date ))->format('j / m / Y') }}
					</p>
				</div>
			</div>
			<div>
				<div class="sidebar__item row">
					<p class="is-grow">
						<b>
							Totaal:
						</b>
					</p>
					<p>
						€ {{ $ticket['price'] }}
					</p>
				</div>
			</div>
		</section>
	</div>
@endsection