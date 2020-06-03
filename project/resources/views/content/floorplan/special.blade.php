@extends('layouts.speciallayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<div class="page special">
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
				color: {{ $event['prim_color'] }}
			}
			
			.btn:hover {
				border: none;
				background-color: {{ $event['textcolor'] }};
				color: {{ $event['prim_color'] }};
			}
			
			.special__svg svg {
				fill: {{ $event['prim_color'] }};
			}
			
			.btn:hover svg {
				fill: {{ $event['prim_color'] }};
			}
			
			.tab {
				color: #000;
			}
			
			.tab__button.active {
				background-color:{{ $event['prim_color'] }};
				color: {{ $event['textcolor'] }};
			}
			
			.table__item:nth-child(odd) {
				background-color: {{ $event['prim_color'] }}55; /* laatste twee cijfers zijn opacity*/
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