<footer class="footer">
	<div class="logo">
		eventify
	</div>
	<div class="row row--stretch">
		<ul class="list">
			<li class="list__item">
				bedrijfsnaam
			</li>
			<li class="list__item">
				bedrijfstraat 45
			</li>
			<li class="list__item">
				3000 Leuven
			</li>
			<li class="list__item">
				+32 456 78 92 34
			</li>
			<li class="list__item">
				bedrijf@mail.be
			</li>
		</ul>

		<ul class="list">
			<li class="list__item">
				Organisatoren
			</li>
			<li class="list__item">
				<a class="list__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">overzicht</a>
			</li>
			<li class="list__item">
				<a class="list__link" href="{{ route('start.organisation') }}#feature-1">onze features</a>
			</li>
			<li class="list__item">
				<a class="list__link" href="{{ route('start.organisation') }}#price">prijzen</a>
			</li>
		</ul>

		<ul class="list">
			<li class="list__item">
				Bezoekers
			</li>
			<li class="list__item">
				<a class="list__link" href="">Zoek evenementen</a>
			</li>
			<li class="list__item">
				<a class="list__link" href="">Bekijk mijn tickets</a>
			</li>
		</ul>

	</div>


</footer>
