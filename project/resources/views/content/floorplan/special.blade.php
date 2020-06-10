@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="page special">
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
		
		<section class="special__content row row--stretch">
			<div class="tab spacing-top-s">
				<div class="tab__heading">
					@foreach($event->floorplans()->get() as $floorplan)
						<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $floorplan['id'] }})">
							{{ $floorplan['name'] }}
						</button>
					@endforeach
				</div>
				
				<div id="tab__container">
					@foreach($event->floorplans()->get() as $floorplan)
						<div class="tab__content ctn--image" id="{{ $floorplan['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
							<img src="{{ asset('images/' . $floorplan['image'] ) }}" alt="">
						</div>
					@endforeach
				</div>
			</div>
		</section>
	</div>
	<script src="{{ asset('js/openTabs.js') }}"></script>
@endsection