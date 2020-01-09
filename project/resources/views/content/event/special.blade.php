@extends('layouts.authlayout')
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
		
		@desktop
			@include('partials.header')
		@enddesktop
		
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
			<div class="row row--wrap">
				<a class="btn special__svg">
					@svg('calendar (3)')
				</a>
				<a class="btn special__svg">
					@svg('map (1)')
				</a>
				<a class="btn special__svg">
					@svg('camera')
				</a>
				<a class="btn special__svg">
					@svg('info')
				</a>
				<a class="btn special__svg">
					@svg('team')
				</a>
				<a class="btn special__svg">
					@svg('comment')
				</a>
			</div>
		</section>
	</div>
@endsection