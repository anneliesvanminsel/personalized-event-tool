@extends('layouts.speciallayout')

@section('title')
	evento - {{ $event['title'] }}
@endsection

@section('content')
	<style>
		.tab__heading.dark .tab__button.active {
			color: {{ $event['prim_color'] }};
		}
		
		.tab__button.active {
			color: {{ $event['prim_color'] }};
		}
		
		.tab__heading.dark .tab__button.active::after {
			background-color: {{ $event['prim_color'] }};
		}
		
		.tab__button.active:after {
			background-color: {{ $event['prim_color'] }};
		}
	</style>
	
	<div class="special section {{ $event['theme'] }}">
		<section class="special__content">
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