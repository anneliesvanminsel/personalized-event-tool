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
		</style>
		
		<section class="page-alignment spacing-top-m">
			<h1 class="center">
				{{ $event['title'] }}
			</h1>
		</section>
		
		<section class="special__content row row--stretch">
			@foreach($floorplans as $floorplan)
				<div class="floorplan">
					<h3>
						{{ $floorplan->name }}
					</h3>
					<div class="floorplan__image ctn--image">
						<img src="{{ asset('images/' . $floorplan['image'] ) }}" alt="{{ $floorplan['name'] }}" loading="lazy">
					</div>
				</div>
			@endforeach
		</section>
	</div>
@endsection