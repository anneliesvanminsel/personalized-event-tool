@extends('layouts.organisation')
@section('title')
	{{ $event['title'] }} - planning
@endsection
@section('content')
	<div class="section content">
		<div class="row row--stretch">
			<h2 class="is-grow">
				{{ $event['title'] }}
			</h2>
			<div class="item__actions row row--stretch">
				<form
					class="form"
					onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt {{ $event['published'] === 0 ? 'zichtbaar maken' : 'onzichtbaar maken' }}?');"
					method="POST"
					action="{{ route('event.publish', ['organisation_id' => $organisation['id'], 'event-id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					
					<button title="set visiblility" class="button is-icon" type="submit">
						@if($event['published'] === 0)
							@svg('hide', 'is-btn')
						@else
							@svg('view', 'is-btn')
						@endif
					</button>
				</form>
				<a title="edit event information" class="button is-icon" href={{route('event.update', ['organisation_id' => $organisation['id'], 'event_id' => $event->id])}}>
					@svg('edit', 'is-btn')
				</a>
				<form
					class="form"
					onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
					method="POST"
					action="{{ route('event.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					<button class="button is-icon" type="submit">
						@svg('delete', 'is-btn')
					</button>
				</form>
			</div>
		</div>
		
		<div class="section__nav nav">
			<div class="nav__tabs">
				<a class="nav__item active" href="{{ route('event.settings.schedule', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Planning
				</a>
				@if($organisation->subscription_id === 2 || $organisation->subscription_id === 3)
					<a class="nav__item" href="{{ route('event.settings.floorplan', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Grondplan
					</a>
				@endif
				<a class="nav__item" href="{{ route('event.settings.ticket', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Ticket
				</a>
				@if($organisation->subscription_id === 2 || $organisation->subscription_id === 3)
					<a class="nav__item" href="{{ route('event.settings.message', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
						Berichten
					</a>
				@endif
			</div>
		</div>
		
		<div id="tab__container">
			<div class="row row--center">
				<div class="is-grow" style="position: relative;">
					<div class="nav__item expands">
						<div class="nav__search-icon is-disabled">
							@svg('search')
						</div>
					</div>
				</div>
				<a class="btn is-small" href="{{ route('schedule.create', ['organisation_id' => $organisation['id'], 'event_id' => $event['id']]) }}">
					Voeg een item toe
				</a>
			</div>
				
			@if($event->sessions()->exists())
				<section class="section schedule">
					@if($event->schedule === 'timeline')
						@include('content.schedule.timeline')
					@elseif($event->schedule === 'timetable')
						@include('content.schedule.timetable')
					@else
						@include('content.schedule.table')
					@endif
				
				</section>
			@endif
		</div>
	</div>
@endsection