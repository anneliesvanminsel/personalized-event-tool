@extends('layouts.event')

@section('theme')
	{{ $event['theme'] }}
@endsection

@section('title')
	evento - {{ $event['title'] }}
@endsection

@section('content')
	<style>
		.hero:before {
			background-image: linear-gradient(to right, {{ $event['prim_color'] }}, {{ $event['sec_color'] }});
		}
		.hero.dark:before {
			background-image: linear-gradient(to right, {{ $event['prim_color'] }}, {{ $event['sec_color'] }});
		}
	</style>
	<div class="hero {{ $event ? $event['theme'] : '' }}">
		<div class="hero__image">
			@if(File::exists(public_path() . "/images/" . $event['image']))
				<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/1000/1000" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</div>
		
		<div class="hero__actions row">
			@if(Auth::user() && $event->organisation_id === Auth::user()->organisation_id)
				@php
					$organisation = $event->organisation;
				@endphp
				<div class="item__actions row row--stretch">
					<form
						class="form"
						onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt {{ $event['published'] === 0 ? 'zichtbaar maken' : 'onzichtbaar maken' }}?');"
						method="POST"
						action="{{ route('event.publish', ['organisation_id' => $organisation['id'],'event-id' => $event['id']]) }}"
					>
						{{ csrf_field() }}
						
						<button title="set visiblility" class="button is-icon" type="submit">
							@if($event['published'] === 0)
								@svg('hide', 'is-btn is-heart')
							@else
								@svg('view', 'is-btn is-heart')
							@endif
						</button>
					</form>
					<a title="edit event information" class="button is-icon" href={{route('event.update', ['organisation_id' => $organisation['id'], 'event_id' => $event->id])}}>
						@svg('edit', 'is-btn is-heart')
					</a>
					<a title="edit event settings" class="button is-icon" href={{route('event.edit.settings', ['organisation_id' => $organisation['id'],'event_id' => $event->id])}}>
						@svg('tools', 'is-btn is-heart')
					</a>
					<form
						class="form"
						onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
						method="POST"
						action="{{ route('event.delete', ['organisation_id' => $organisation['id'],'event_id' => $event['id'] ]) }}"
					>
						{{ csrf_field() }}
						<button class="button is-icon" type="submit">
							@svg('delete', 'is-btn is-heart')
						</button>
					</form>
				</div>
			@else
				<form
					class="form"
					method="POST"
					action="{{ route('event.save', ['event-id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					@if(Auth::user() && $event->savedusers->contains(Auth::user()->id))
						<button title="download" class="button is-icon" type="submit">
							@svg('download', 'is-btn is-white')
						</button>
					@else
						<button title="download" class="button is-icon" type="submit">
							@svg('download', 'is-btn is-white')
						</button>
					@endif
				</form>
				<form
					class="form"
					method="POST"
					action="{{ route('event.like', ['event-id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					@if(Auth::user() && $event->favusers->contains(Auth::user()->id))
						<button title="unlike" class="button is-icon" type="submit">
							@svg('heart-full', 'is-btn is-heart')
						</button>
					@else
						<button title="like" class="button is-icon" type="submit">
							@svg('heart-line', 'is-btn is-heart')
						</button>
					@endif
				</form>
			@endif
		</div>
		
		<div class="hero__content">
			<h1 class="hero__title">
				{{ $event['title'] }}
			</h1>
			<div class="hero__description">
				{{ $event['description'] }}
			</div>
		</div>
	</div>
	
	<style>
		.card.ticket {
			border: 1px solid {{ $event['prim_color'] }};
		}
		
		.ticket__price {
			color: {{ $event['prim_color'] }};
		}
		
		.card.ticket:hover {
			border: 1px solid {{ $event['sec_color'] }};
		}
		
		.ticket__actions .btn {
			background-color: {{ $event['prim_color'] }};
		}
		
		.ticket__accent:after {
			border: 1px solid {{ $event['prim_color'] }};
		}
		
		.ticket__accent:before {
			border: 1px solid {{ $event['prim_color'] }};
		}
		
		.ticket__price:after {
			background: {{ $event['prim_color'] }};
		}
		
		.ticket__price:before {
			background: {{ $event['prim_color'] }};
		}
		
		.card.ticket:hover .ticket__price:before {
			background: {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__price {
			color: {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__actions .btn {
			background-color: {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__accent:before {
			border: 1px solid {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__accent:after {
			border: 1px solid {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__price:before {
			background: {{ $event['sec_color'] }};
		}
		
		.card.ticket:hover .ticket__price:after {
			background: {{ $event['sec_color'] }};
		}
	</style>
	
	@if($event->tickets()->exists())
		<section class="section is-pull-up" id="tickets">
			<div class="row row--center">
				<h3 class="is-white hero__subtitle">
					tickets
				</h3>
				@if($event->address()->exists())
					<div class="row row--center hero__location">
						@svg('location', 'is-white')
						{{ $event->address->first()->locationname ? $event->address->first()->locationname . ',' : '' }} {{ $event->address()->first()->city }}
					</div>
				@endif
			</div>
			
			<div class="card--container">
				@foreach($event->tickets()->get() as $ticket)
					@include('partials.ticket', $ticket)
				@endforeach
			</div>
		</section>
	@endif
	
	@include('partials.photowall')
	
	<style>
		.tab__button {
			color: {{ $event['sec_color'] }};
		}
		
		.tab__button.active {
			color: {{ $event['prim_color'] }};
			border-color: {{ $event['prim_color'] }};
		}
		
		.tab__heading.dark .tab__button {
			color: {{ $event['sec_color'] }};
		}
		
		.tab__heading.dark .tab__button.active {
			color: {{ $event['prim_color'] }};
			border-color: {{ $event['prim_color'] }};
		}
	</style>
	
	@if($event->sessions()->exists())
		<section class="section schedule {{ $event['theme'] }}" id="schedule">
			<h3 class="schedule__title">
				Planning
			</h3>
			
			@if($event->schedule === 'timeline')
				@include('content.schedule.timeline')
			@elseif($event->schedule === 'timetable')
				@include('content.schedule.timetable')
			@else
				@include('content.schedule.table')
			@endif
		</section>
	@endif
	
	
	@if($event->address()->first())
		@php
			$address = $event->address()->first();
		@endphp
		<section class="spacing-top-l">
			<div>
				{!! $address['googleframe'] !!}
			</div>
		</section>
	@endif
	
@endsection