@extends('layouts.masterlayout')
@section('title')
	evento - Onderhoud
@endsection
@section('content')
	<section class="section with-space-top">
		<h1>
			Onderhoudsdocumentatie
		</h1>
		
		<div class="row row--stretch">
			<a href="#server" class="btn" style="margin-left: 0">www.evento.be</a>
			<a href="#self" class="btn">Zelf het project opzetten</a>
		</div>
		
		<div class="faq" id="server">
			<h2>
				www.evento.be
			</h2>
			<div class="faq__item" id="faq-1">
				<button class="faq__question" data-target="faq-1">
					<h4 class="faq__title">
						Wie zorgt ervoor dat evento blijft werken?
					</h4>
					<div class="fas">
						@svg('bottom')
					</div>
				</button>
				<p class="faq__answer">
					Evento wordt onderhouden door de developer, Annelies Van Minsel. <br>
					Gebruikers moeten niets extra ondernemen om gebruik te maken van het platform.
				</p>
			</div>
			
			<div class="faq__item" id="faq-2">
				<button class="faq__question" data-target="faq-2">
					<h4 class="faq__title">
						Waar draait evento op?
					</h4>
					<div class="fas">
						@svg('bottom')
					</div>
				</button>
				<p class="faq__answer">
					Evento draait momenteel op een webserver van developer Annelies. <br>
					Evento maakt ook gebruik van de mailserver en database gelinkt aan deze webserver.
				</p>
			</div>
		</div>
		
		
		<div class="" id="self">
			<h2>
				Zelf het project opzetten
			</h2>
			
			<ol class="ol">
				<li>
					Zorg dat je een computer hebt met <a class="link" href="https://getcomposer.org/" target="_blank">composer</a> en een lokale server.
					Je hebt ook de <a class="link" href="https://www.npmjs.com/" target="_blank">Node package manager of NPM</a> nodig.
					Je hebt ook een database nodig.
					<br>
					Ik gebruik als lokale server <a class="link" href="https://www.apachefriends.org/index.html" target="_blank">'XAMPP'</a>
				</li>
				
				<li>
					Haal de <a class="link" href="https://github.com/anneliesvanminsel/personalized-event-tool" target="_blank">projectbestanden van github</a>.
					<br>
					In het geval dat je gebruik maak van 'XAMPP', moet je de repo clonen in de htdocs-map.
				</li>
				<li>
					Open het project via de terminal of open het project in jouw editor naar keuze. De meeste editors hebben een terminal ingebouwd.
					<br>
					<b>Let op!:</b> indien je de bestanden via github gebruikt, zal je in de map 'project' moeten zijn.
					<br>
					Ik gebruik <a  class="link" href="https://www.jetbrains.com/phpstorm/" target="_blank">PHP Storm</a> en gebruik de ingebouwd terminal.
				</li>
				<li>
					In de map 'project' voer je via de terminal <span class="code">composer install</span> uit.
				</li>
				<li>
					In de map 'project' voer je via de terminal <span class="code">npm install</span> uit.
				</li>
				<li>
					Indien je gebruik maakt van XAMPP zal je de permissions van XAMPP-folders moeten wijzigen zodat het project opgestart kan worden.
					Dit doe je via <a class="link" href="https://stackoverflow.com/questions/9046977/xampp-permissions-on-mac-os-x" target="_blank">deze link</a>
				</li>
				<li>
					Maak een <span class="file">.env</span>-file aan, en kopieer de inhoud van <span class="file">.env.example</span> erin.
					<br>
					Vul deze file aan met de eigen database-informatie, eigen mailserver indien gewenst.
				</li>
				<li>
					Voer <span class="code">php artisan migrate --seed</span> uit in de terminal.
				</li>
				<li>
					Indien je aanpassingen gaat doen aan de styling, kan je ook <span class="code">npm run watch</span> uitvoeren in de terminal.
				</li>
				<li>
					Als je al dit hebt gedaan, kan je surfen naar de lokale site en kan je de website gebruiken.
				</li>
			
			</ol>
		</div>
	</section>
	<script src="{{ asset('js/faq.js') }}" > </script>
@endsection