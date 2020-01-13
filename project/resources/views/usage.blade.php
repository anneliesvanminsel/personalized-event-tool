@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Gebruiksdocumentatie
		</h1>
		
		<div class="row row--stretch">
			<a href="#guest" class="btn">Voor gebruikers</a>
			<a href="#organisator" class="btn btn--blue">Voor organisatoren</a>
			<a href="#volunteer" class="btn btn--orange">Voor medewerkers</a>
		</div>
		
		<div class="faq spacing-top-m" id="guest">
			<h2>
				Voor gebruikers
			</h2>
			
			<div class="faq__item" id="faq-g1">
				<button class="faq__question" data-target="faq-g1">
					<div class="faq__title">
						Hoe maak ik een account?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Evento wordt onderhouden door de developer, Annelies Van Minsel. <br>
					Gebruikers moeten niets extra ondernemen om gebruik te maken van het platform.
				</p>
			</div>
			
			<div class="faq__item" id="faq-g2">
				<button class="faq__question" data-target="faq-g2">
					<div class="faq__title">
						Hoe koop ik een ticket?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via de evenementspagina kan je tickets bestellen. <br>
					Als het evenement nog geen tickets heeft toegevoegd, kan je nog geen tickets bestellen.
				</p>
			</div>
			
			<div class="faq__item" id="faq-g3">
				<button class="faq__question" data-target="faq-g3">
					<div class="faq__title">
						Waar vind ik mijn tickets terug?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via het tab tickets in de mobiele versie. <br>
					Via jouw account in de desktop versie.
				</p>
			</div>
		</div>
		
		<div class="faq spacing-top-m" id="organisator">
			<h2>
				Voor organisatoren
			</h2>
			
			<div class="faq__item" id="faq-o1">
				<button class="faq__question is-admin" data-target="faq-o1">
					<div class="faq__title">
						Hoe maak ik een account?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Organisatoren moeten eerst een prijspakket kiezen via de organisatoren-pagina.<br>
					Na het registreren van een betaling kan de organisator een bedrijfsaccount aanmaken.
					Het bedrijfsaccount heeft ook aanmeldingsgegevens nodig. Deze kan je zelf kiezen.
				</p>
			</div>
			
			<div class="faq__item" id="faq-o2">
				<button class="faq__question is-admin" data-target="faq-o2">
					<div class="faq__title">
						Hoe maak ik een evenement aan?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via het dashboard.
				</p>
			</div>
			
			<div class="faq__item" id="faq-o3">
				<button class="faq__question is-admin" data-target="faq-o3">
					<div class="faq__title">
						Hoe voeg ik extra gegevens toe aan mijn evenement?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via de event-settings.
				</p>
			</div>
			
			<div class="faq__item" id="faq-o4">
				<button class="faq__question is-admin" data-target="faq-o4">
					<div class="faq__title">
						Hoe scan ik een ticket?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via eender welke QR-code scanner. (volg de link)
				</p>
			</div>
		</div>
		
		<div class="faq spacing-top-m" id="volunteer">
			
			<h2>
				Voor medewerkers
			</h2>
			
			<div class="faq__item" id="faq-v1">
				<button class="faq__question is-volunteer" data-target="faq-v1">
					<div class="faq__title">
						Hoe maak ik een account?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Medewerkers kunnen zelf geen account aanmaken. <br>
					Medewerkers krijgen enkel een account wanneer een bedrijf/organisator een medewerker toevoegt. <br>
					Medewerkers kunnen hun eerste wachtwoord niet zelf kiezen. Zij kunnen wel hun wachtwoord wijzigen via de optie 'wachtwoord vergeten'.
				</p>
			</div>
			
			<div class="faq__item" id="faq-v2">
				<button class="faq__question is-volunteer" data-target="faq-v2">
					<div class="faq__title">
						Hoe kan ik mij voor een shift of een taak inschrijven?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Via de speciale pagina.
				</p>
			</div>
		</div>
	</section>
	<script src="{{ asset('js/faq.js') }}" > </script>
@endsection
