<div class="footer--container {{ (strpos(Route::currentRouteName(), 'event.detail') === 0) ? $event['theme'] : '' }}">
	<footer class="footer">
		<div class="logo is-white has-line">
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
						Bezoekers
					</h5>
				</li>
				<li class="list__item">
					<a class="list__link {{ (strpos(Route::currentRouteName(), 'index') === 0) ? 'active' : '' }}" href="{{ route('index') }}#search-events-form">
						zoek evenementen
					</a>
				</li>
				<li class="list__item">
					@guest
						<a class="list__link" href="{{ route('register') }}">
							maak nu een account
						</a>
					@else
						@if(Auth::user()->role === "volunteer" || Auth::user()->role === "guest" )
							<a class="list__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}" href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}#tickets">
								bekijk mijn tickets
							</a>
						@endif
					@endguest
				</li>
			</ul>
			
			<ul class="list spacing-top-s">
				<li class="list__item">
					<h5>
						Bedrijven
					</h5>
				</li>
				<li class="list__item">
					<a class="list__link {{ (strpos(Route::currentRouteName(), 'start.organisation') === 0) ? 'active' : '' }}" href="{{ route('start.organisation') }}">abonnementen</a>
				</li>
				<li class="list__item">
					<a class="list__link" href="{{ route('start.organisation') }}">maak een event aan</a>
				</li>
			</ul>
		</div>
	</footer>
	<div class="sub-footer">
		<div class="sub-footer__content row row--center">
			<div class="row">
				<a class="link" href="{{ route('usage') }}">Gebruikersdocumentatie</a>
				<a class="link" href="{{ route('maintenance') }}">Onderhoudsdocumentatie</a>
			</div>
			<div>
				&copy; <span class="logo logo--xs">evento</span>
			</div>
		</div>
	</div>
</div>
