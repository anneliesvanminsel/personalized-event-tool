@extends('layouts.authlayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<style>
		.btn {
			border-color: {{ $event['textcolor'] }};
			color: {{ $event['textcolor'] }}
					}
		
		.btn:hover {
			background-color: {{ $event['textcolor'] }};
			color: {{ $event['bkgcolor'] }};
		}
		
		svg {
			fill: {{ $event['textcolor'] }};
		}
	</style>
	
	<div class="page special" style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
		<section>
			@if(File::exists(public_path() . "/images/" . $event['logo']))
				<div class="special__image ctn--image">
					<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@else
				<div class="special__image ctn--image">
					<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@endif
		</section>
		
		<section class="special__content row row--wrap">
			<div class="special__svg">
				@svg('calendar (3)')
			</div>
			<div class="special__svg">
				@svg('map (1)')
			</div>
			<div class="special__svg">
				@svg('camera')
			</div>
			<div class="special__svg">
				@svg('info')
			</div>
			<div class="special__svg">
				@svg('team')
			</div>
		</section>
	</div>
@endsection