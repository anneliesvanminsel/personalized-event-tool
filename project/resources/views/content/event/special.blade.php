@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="page special" style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
		<style>
			.header .nav__link {
				color: {{ $event['textcolor'] }}
			}
			
			.header .logo::before {
				background-color: {{ $event['textcolor'] }};
			}
			
			.special__svg {
				background-color: {{ $event['textcolor'] }};
			}
			
			.special__svg svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.special__svg:hover svg {
				fill: {{ $event['bkgcolor'] }};
			}
			
			.btn:hover svg {
				fill: {{ $event['bkgcolor'] }};
			}
		</style>
		
		<section class="page-alignment spacing-top-m">
			<h1 class="center">
				{{ $event['title'] }}
			</h1>
		</section>
		
		<section class="special__content row row--stretch">
			@if(File::exists(public_path() . "/images/" . $event['logo']))
				<div class="special__image ctn--image">
					<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@else
				<div class="special__image ctn--image">
					<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@endif
			<div class="row row--wrap is-mobile">
				@if($event->sessions()->exists())
					<a title="bekijk planning" class="special__svg" href="{{ route('schedule.special', ['event_id' => $event['id']]) }}">
						@svg('calendar (3)')
					</a>
				@endif
				
				@if($event->floorplans()->exists())
					<a title="bekijk grondplan" class="special__svg" href="{{ route('floorplan.special', ['event_id' => $event['id']]) }}">
						@svg('map (1)')
					</a>
				@endif
				
				
				<a title="bekijk afbeeldingen" class="special__svg">
					@svg('camera')
				</a>
				
				<a title="bekijk informatie" class="special__svg">
					@svg('info')
				</a>
				<a title="bekijk groepen" class="special__svg">
					@svg('team')
				</a>
				
				@if($event->messages()->exists())
					<a title="bekijk berichten" class="special__svg" href="{{ route('message.special', ['event_id' => $event['id']]) }}">
						@svg('comment')
					</a>
				@endif
			</div>
		</section>
	</div>
@endsection