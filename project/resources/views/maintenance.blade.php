@extends('layouts.masterlayout')
@section('title')
	evento - Onderhoud
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Onderhoudsdocumentatie
		</h1>
		
		<div class="faq">
			<div class="faq__item" id="faq-1">
				<button class="faq__question" data-target="faq-1">
					<div class="faq__title">
						Wie zorgt ervoor dat evento blijft werken?
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
			
			<div class="faq__item" id="faq-2">
				<button class="faq__question" data-target="faq-2">
					<div class="faq__title">
						Waar draait evento op?
					</div>
					<div class="fas">
						@svg('bottom', 'is-small')
					</div>
				</button>
				<p class="faq__answer">
					Evento draait momenteel op een webserver van developer Annelies. <br>
					Evento maakt ook gebruik van de mailserver en database gelinkt aan deze webserver.
				</p>
			</div>
		</div>
	</section>
	<script src="{{ asset('js/faq.js') }}" > </script>
@endsection