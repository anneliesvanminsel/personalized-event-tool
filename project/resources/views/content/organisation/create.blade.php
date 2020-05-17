@extends('layouts.masterlayout')
@section('title')
	evento - betalen
@endsection
@section('content')
	<div class="section account with-space-top">
		<section class="is-grow">
			<form method="POST" action=""
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
									<input type="text" name="cardNumber" placeholder="Valid card number"
									       class="form__input"
									>
									
									<label class="form__label" for="cardNumber">
										Kaartnummer
									</label>
								</div>
								
								<div class="form__group">
									<input type="text" name="cardNumber" placeholder="Valid card number"
									       class="form__input"
									>
									
									<label class="form__label" for="cardNumber">
										vervaldatum
									</label>
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
		<section class="sidebar">
			<h3 class="sidebar__title">
				{{ $subscription['type'] }}
			</h3>
			
			<div class="sidebar__section">
				<div class="sidebar__item">
					Je hebt gekozen voor een ticket '{{ $subscription['type'] }}'.
					
					Je kan nu betalen voor jouw ticket. Hieronder de betalingsgegevens.
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
						€ {{ $subscription['price'] }}
					</p>
				</div>
				<div class="sidebar__item row">
					<p class="is-grow">
						<b>
							datum:
						</b>
					</p>
					<p>
						€ {{ $subscription['date'] }}
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
						€ {{ $subscription['price'] }}
					</p>
				</div>
			</div>
		</section>
	</div>
	
	<section class="page-alignment spacing-top-m">
		<h1>
			{{ $subscription['name'] }}
		</h1>
		<p>
			Na betaling zal het ticket in uw account op de website of via tickets in uw applicatie te vinden zijn. <br>
			U kunt niet afzien van de aankoop van het ticket.
		</p>
		
		<p class="spacing-top-m">
			Prijs:
		</p>
	
	
	
	</section>
@endsection