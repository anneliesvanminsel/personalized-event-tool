@extends('layouts.masterlayout')
@section('title')
	evento - betalen
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			{{ $event['title'] }} - {{ $ticket['name'] }}
		</h1>
		<p>
			Na betaling zal het ticket in uw account op de website of via tickets in uw applicatie te vinden zijn. <br>
			U kunt niet afzien van de aankoop van het ticket.
		</p>
		
		<p class="spacing-top-m">
			Prijs: € {{ $ticket['price'] }}
		</p>
		
		<style>
			.btn {
				background-color: {{ $event['bkgcolor'] }};
				border-color: {{ $event['bkgcolor'] }};
				color: {{ $event['textcolor'] }};
			}
			
			.btn:hover {
				border-color: {{ $event['bkgcolor'] }};
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['bkgcolor'] }};
			}
		</style>
		
		<form method="POST" action="{{ route('ticket.postpayment', ['event_id' => $event['id'], 'ticket_id' => $ticket['id'] ]) }}"
		      class="form spacing-top-m" enctype="multipart/form-data">
			@csrf
			
			<div class="container">
				<div class="card" style="border-color: {{ $event['bkgcolor'] }};">
					<div class="card__header">
						<div role="tablist" class="row row--stretch form__row has-three">
							<div class="card" style="border-color: {{ $event['bkgcolor'] }}; background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }};  ">
								<a data-toggle="pill" href="#credit-card" class="nav-link active">
									<i class="fas fa-credit-card mr-2"></i>
									Credit Card
								</a>
							</div>
							<div class="card" style="border-color: {{ $event['bkgcolor'] }}; color: {{ $event['bkgcolor'] }};">
								<a data-toggle="pill" href="#paypal" class="nav-link">
									<i class="fab fa-paypal mr-2"></i>
									Paypal
								</a>
							</div>
							<div class="card" style="border-color: {{ $event['bkgcolor'] }}; color: {{ $event['bkgcolor'] }};">
								<a data-toggle="pill" href="#net-banking" class="nav-link">
									<i class="fas fa-mobile-alt mr-2"></i>
									Net Banking
								</a>
							</div>
						</div>
						
						<div class="tab-content spacing-top-m">
							<div class="form__group">
								<input
										class="form__input"
										type="text"
										name="username"
										placeholder="bv. Jan Peeters"
										style="border-color: {{ $event['bkgcolor'] }};"
								>
								<label class="form__label" for="username">
									Naam op de kaart
								</label>
							</div>
								
							<div class="form__group">
								<input type="text" name="cardNumber" placeholder="Valid card number"
								       class="form__input"
								       style="border-color: {{ $event['bkgcolor'] }};"
								>
								
								<label class="form__label" for="cardNumber">
									Kaartnummer
								</label>
							</div>
							
							<div class="spacing-top-s">
								<h3>
									Expiration Date
								</h3>
								<div class="row row--stretch form__row">
									
									<div class="form__group">
										<input type="number" placeholder="maand" name=""
										       class="form-control" style="border-color: {{ $event['bkgcolor'] }};"
										>
										<label class="form__label">
											maand
										</label>
									</div>
									
									<div class="form__group">
										<input type="number" placeholder="jaar" name=""
										       class="form-control" style="border-color: {{ $event['bkgcolor'] }};"
										>
										<label class="form__label">
											jaar
										</label>
									</div>
								</div>
							</div>
							
							<div class="spacing-top-m">
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
@endsection