
<footer class="footer">
	<div class="footer__logo">
		evento
	</div>
	<div class="row row--stretch">
		<ul class="list spacing-top-s">
			<li class="list__item">
				evento
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
				<a href="mailto:evento@anneliesvanminsel.be?Subject=Hello%20again" target="_top">
					hallo@evento.be
				</a>
			</li>
		</ul>

		<ul class="list spacing-top-s">
			<li class="list__item">
				<h5>
					Bezoekers (link!)
				</h5>
			</li>
			<li class="list__item">
				<a class="list__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}">
					Zoek evenementen
				</a>
			</li>
			<li class="list__item">
				@guest
					<a class="list__link" href="{{ route('register') }}">
						Maak nu een account
					</a>
				@else
					@if(Auth::user()->role === "volunteer" || Auth::user()->role === "guest" )
						<a class="list__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}#tickets">
							Bekijk mijn tickets
						</a>
					@endif
				@endguest
			
			</li>
			
		</ul>

		<ul class="list spacing-top-s">
			<li class="list__item">
				<h5>
					Bedrijven (link!)
				</h5>
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
	</div>
</footer>
