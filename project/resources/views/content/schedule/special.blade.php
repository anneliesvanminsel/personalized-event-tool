@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="special {{ $event['theme'] }}" style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
		<style>
			.header .nav__link {
				color: {{ $event['textcolor'] }}
			}
			
			.header .logo::before {
				background-color: {{ $event['textcolor'] }};
			}
			
			.btn {
				border: none;
				width: auto;
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['bkgcolor'] }}
			}
			
			.btn:hover {
				border: none;
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['bkgcolor'] }};
			}
			
			.special__svg svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.btn:hover svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.tab {
				color: #000;
			}
			
			.tab__button.active {
				background-color:{{ $event['bkgcolor'] }};
				color: {{ $event['textcolor'] }};
			}
			
			.table__item:nth-child(odd) {
				background-color: {{ $event['bkgcolor'] }}55; /* laatste twee cijfers zijn opacity*/
			}
		</style>
		
		<section class="section">
			
			
			
			@if($event->schedule === 'timeline')
				@include('content.schedule.timeline')
			@elseif($event->schedule === 'timetable')
				@include('content.schedule.timetable')
			@else
				@include('content.schedule.table')
			@endif
			
		</section>
	</div>
	<script src="{{ asset('js/openTabs.js') }}" > </script>
@endsection