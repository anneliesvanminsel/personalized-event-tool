<section class="sidebar">
	<h3 class="sidebar__title is-white">
		Account
	</h3>
	
	<div class="sidebar__section">
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
				href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
			>
				mijn tickets
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.favorites') === 0) ? 'active' : '' }}"
				href="{{ route('user.favorites', ['user_id' => Auth::user()->id]) }}"
			>
				mijn favorieten
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.events') === 0) ? 'active' : '' }}"
				href="{{ route('user.events', ['user_id' => Auth::user()->id]) }}"
			>
				mijn evenementen
			</a>
		</div>
	</div>
	
	<div>
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
				href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
			>
				account bewerken
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link is-disabled"
				href="#"
				disabled
			>
				account instellingen
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