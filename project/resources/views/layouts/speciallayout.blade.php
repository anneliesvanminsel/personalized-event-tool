<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>@yield('title')</title>
		
		<!-- Styles & fonts -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Poiret+One&display=swap" rel="stylesheet">
		
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('site.webmanifest') }}">
		<link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#46d5ef">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
	
	</head>
	<body class="{{ $event['theme'] }}">
		<div class="header__container {{ (strpos(Route::currentRouteName(), 'event.detail') === 0) ? $event['theme'] : '' }}">
			<header class="header">
				<div class="row row--center is-grow">
					<a href="{{ url()->previous() }}">
						@if($event['theme'] === "dark")
							@svg('left', 'is-white')
						@else
							@svg('left')
						@endif
					</a>
					
					<a href="{{ route('event.special', ['event' => $event['id']] ) }}">
						<h2 class="{{ $event['theme'] === 'dark' ? 'is-white' : '' }}">
							{{ $event['title'] }}
						</h2>
					</a>
				</div>
				<a href="{{ route('user.events', ['user_id' => Auth::user()->id]) }}">
					@if($event['theme'] === "dark")
						@svg('account', 'is-white is-large')
					@else
						@svg('account', 'is-large')
					@endif
				</a>
			</header>
		</div>
		
		<main>
			@yield('content')
		</main>
		
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>