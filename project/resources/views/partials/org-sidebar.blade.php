<section class="sidebar" id="sidebar">
	@if($organisation['logo'] && File::exists(public_path() . "/images/" . $organisation['logo']))
		<div class="ctn--image sidebar__image">
			<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
		</div>
	@endif
	<h3 class="sidebar__title">
		{{ $organisation['name'] }}
	</h3>
	
	<div class="sidebar__section">
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'org.dashboard') === 0) || (strpos(Route::currentRouteName(), 'organisation.search.events') === 0) ? 'active' : '' }}"
				href="{{ route('org.dashboard', ['user_id' => Auth::user()->id]) }}"
			>
				mijn evenementen
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link is-disabled"
			>
				mijn gegevens
			</a>
		</div>
	</div>
	
	<div>
		<div class="sidebar__item">
			<a
				class="sidebar__link {{ (strpos(Route::currentRouteName(), 'organisation.update') === 0) ? 'active' : '' }}"
				href="{{ route('organisation.update', ['organisation_id' => $organisation->id]) }}"
			>
				organisatie bewerken
			</a>
		</div>
		<div class="sidebar__item">
			<a
				class="sidebar__link is-disabled"
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

<div>
	<button onclick="openNav()" class="btn is-icon sidebar__icon" id="icon">
		@svg('right', 'is-icon')
	</button>
</div>

<script>
    function openNav() {
        document.getElementById("sidebar").classList.toggle('is-open');
        document.getElementById("account").classList.toggle('open');
        document.getElementById("icon").classList.toggle('open');
    }
</script>