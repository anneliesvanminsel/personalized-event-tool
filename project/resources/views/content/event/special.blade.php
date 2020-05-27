@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="special {{ $event['theme'] }}">
		<style>
			.special__image:before {
				background-image: linear-gradient(to right, {{ $event['prim_color'] }}, {{ $event['sec_color'] }});
			}
			.special__image.dark:before {
				background-image: linear-gradient(to right, {{ $event['prim_color'] }}, {{ $event['sec_color'] }});
			}
			
			.special__svg {
				background-color: {{ $event['prim_color'] }};
			}
			
			.special__svg:hover {
				background-color: {{ $event['sec_color'] }};
			}
			
			.special__svg.is-disabled {
				background-color: {{ $event['prim_color'] }};
			}
			
			.special__svg.is-disabled:hover {
				background-color: {{ $event['prim_color'] }};
			}
		</style>
		
		<div class="special__image ctn--image {{ $event['theme'] }}">
			@if(File::exists(public_path() . "/images/" . $event['image']))
				<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</div>
		
		<section class="special__content">
			<div class="special__description {{ $event['theme'] }}">
				{{ $event['description'] }}
			</div>
			
			<div class="special__items">
				<a title="bekijk grondplan" class="special__svg" href="{{ route('floorplan.special', ['event_id' => $event['id']]) }}">
					@svg('map', 'is-large')
					<span class="special__text">
								grondplan
							</span>
				</a>
				
				<a
					title="bekijk planning"
					class="special__svg"
					href="{{ route('schedule.special', ['event_id' => $event['id']]) }}"
				>
					@svg('calendar', 'is-large')
					<span class="special__text">
								planning
							</span>
				</a>
				
				<a
					title="bekijk berichten"
					class="special__svg"
					href="{{ route('message.special', ['event_id' => $event['id']]) }}"
				>
					@svg('comment', 'is-large')
					<span class="special__text">
									messages
								</span>
				</a>
				
				<a
					title="bekijk informatie"
					class="special__svg is-disabled"
				>
					@svg('info', 'is-large')
					<span class="special__text">
								informatie
							</span>
				</a>
				
				<a
					title="bekijk afbeeldingen"
					class="special__svg is-disabled"
				>
					@svg('instagram', 'is-large')
					<span class="special__text">
									foto's
								</span>
				</a>
			</div>
		</section>
	</div>
@endsection