@extends('layouts.masterlayout')
@section('title')
	evento - organisatie
@endsection
@section('content')
	<section class="section with-space-top">
		<h1>
			Gebruiksdocumentatie
		</h1>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<button class="nav__item tab__links 1 active" onclick="openTabs(event, 1)">
					Voor gebruikers
				</button>
				<button class="nav__item tab__links 2" onclick="openTabs(event, 2)">
					Voor organisatoren
				</button>
			</div>
		</div>
		
		<div id="tab__container">
			<div class="tab__content table" id="1" style="display: block;">
				<div class="table__content">
					<div class="faq__item" id="faq-g1">
						<button class="faq__question" data-target="faq-g1">
							<h4 class="faq__title">
								Hoe maak ik een account?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Een account kan gemaakt worden via
							<a class="link" href="{{ route('register') }}">
								deze link.
							</a> <br>
							Het is zeer simpel. Vanaf je een account hebt, kan je tickets aankopen, evenementen opslaan en meer.
						</p>
					</div>
					
					<div class="faq__item" id="faq-g2">
						<button class="faq__question" data-target="faq-g2">
							<h4 class="faq__title">
								Hoe koop ik een ticket?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Via de evenementspagina kan je tickets bestellen. <br>
							Als het evenement nog geen tickets heeft toegevoegd, kan je nog geen tickets bestellen.
						</p>
					</div>
					
					<div class="faq__item" id="faq-g3">
						<button class="faq__question" data-target="faq-g3">
							<h4 class="faq__title">
								Waar vind ik mijn tickets terug?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Via het tab tickets in de mobiele versie. <br>
							Via jouw account in de desktop versie.
						</p>
					</div>
				</div>
			</div>
			
			<div class="tab__content table" id="2">
				<div class="table__content">
					<div class="faq__item" id="faq-o1">
						<button class="faq__question" data-target="faq-o1">
							<h4 class="faq__title">
								Hoe maak ik een account?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Organisatoren moeten eerst een prijspakket kiezen via de organisatoren-pagina.<br>
							Na het registreren van een betaling kan de organisator een bedrijfsaccount aanmaken.
							Het bedrijfsaccount heeft ook aanmeldingsgegevens nodig. Deze kan je zelf kiezen.
						</p>
					</div>
					
					<div class="faq__item" id="faq-o2">
						<button class="faq__question" data-target="faq-o2">
							<h4 class="faq__title">
								Hoe maak ik een evenement aan?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Via het speciale dashboard voor organisatoren. <br>
							Je kan een evenement aanmaken, bewerken en verwijderen. <br>
							Let op!: als je een evenement aanmaakt, is deze niet direct zichtbaar voor al jouw bezoekers. <br>
							Vergeet zeker niet je evenement zichtbaar te maken als je alles hebt toegevoegd!
						</p>
					</div>
					
					<div class="faq__item" id="faq-o3">
						<button class="faq__question" data-target="faq-o3">
							<h4 class="faq__title">
								Hoe voeg ik extra gegevens toe aan mijn evenement?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Via de evenementinstellingen (<span>@svg('calendar', 'is-small')</span>). Hier kan je een grondplan,
							elementen aan de planning toevoegen en berichten delen.
						</p>
					</div>
					
					<div class="faq__item" id="faq-o4">
						<button class="faq__question" data-target="faq-o4">
							<h4 class="faq__title">
								Hoe scan ik een ticket?
							</h4>
							<div class="fas">
								@svg('bottom')
							</div>
						</button>
						<p class="faq__answer">
							Via eender welke QR-code scanner. Deze zal je een link teruggeven,
							die moet je volgen en de gebruiker zal gecontroleerd worden.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="{{ asset('js/faq.js') }}" > </script>
	<script src="{{ asset('js/openTabs.js') }}"></script>
@endsection
