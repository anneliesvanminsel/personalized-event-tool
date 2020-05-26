<section class="sidebar">
	@if($organisation['logo'] && File::exists(public_path() . "/images/" . $organisation['logo']))
		<div class="ctn--image">
			<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
		</div>
	@else
		<div class="ctn--image">
			<img src="https://placekitten.com/600/600" alt="{{ $organisation['name'] }}" loading="lazy">
		</div>
	@endif
	<h3 class="sidebar__title">
		{{ $organisation['name'] }}
	</h3>
	
	<div class="sidebar__section">
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'org.dashboard') === 0) ? 'active' : '' }}"
				href=""
			>
				mijn evenementen
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link is-disabled {{ (strpos(Route::currentRouteName(), 'user.favorites') === 0) ? 'active' : '' }}"
				href=""
			>
				mijn gegevens
			</a>
		</div>
	</div>
	
	<div>
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
				href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
			>
				organisatie bewerken
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link is-disabled {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
				href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
			>
				instellingen
			</a>
		</div>
		<div class="sidebar__item">
			<a class="sidebar__link"
			   href="{{ route('logout') }}"
			   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
			>
				afmelden
			</a>
			
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</section>