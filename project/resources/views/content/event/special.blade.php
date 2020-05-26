@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="special">
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
		
		<section class="special__content">
			
			<div class="special__image ctn--image">
				@if(File::exists(public_path() . "/images/" . $event['image']))
					<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
				@else
					<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
				@endif
			</div>
			
			
			<div class="special__items section">
				<div class="row row--stretch">
					<a title="bekijk informatie" class="special__svg is-disabled">
						@svg('info', 'is-large')
					</a>
					
					<div>
						<a title="bekijk grondplan" class="special__svg" href="{{ route('floorplan.special', ['event_id' => $event['id']]) }}">
							@svg('map', 'is-large')
						</a>
						
						<div class="row">
							<a title="bekijk berichten" class="special__svg" href="{{ route('message.special', ['event_id' => $event['id']]) }}">
								@svg('comment', 'is-large')
							</a>
							
							<a title="bekijk afbeeldingen" class="special__svg is-disabled">
								@svg('instagram', 'is-large')
							</a>
						</div>
					</div>
					
					<a title="bekijk planning" class="special__svg" href="{{ route('schedule.special', ['event_id' => $event['id']]) }}">
						@svg('calendar', 'is-large')
					</a>
				</div>
				
				
			</div>
			
		</section>
	</div>
@endsection