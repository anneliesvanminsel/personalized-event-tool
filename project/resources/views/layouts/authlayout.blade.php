<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('title')</title>

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

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
	<body>
		<div>
			@yield('content')
		</div>
	</body>
</html>
