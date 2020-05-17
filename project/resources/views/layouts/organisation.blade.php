<!DOCTYPE html>
<html lang="nl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>
	
	<!-- Styles & fonts -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Poiret+One&display=swap" rel="stylesheet">

</head>
<body>
@include('partials.header')

<main>
	<div class="section account with-space-top">
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
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.favorites') === 0) ? 'active' : '' }}"
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
						account bewerken
					</a>
				</div>
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
						href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
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
		
		@yield('content')
	</div>
</main>

@include('partials.footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>