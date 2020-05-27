@extends('layouts.speciallayout')

@section('title')
	evento - {{ $event['title'] }}
@endsection

@section('content')
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