<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>
	
	<!-- Styles & fonts -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Poiret+One&display=swap" rel="stylesheet">

</head>
<body style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
@include('partials.header')

<main>
	@yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>