@extends('layouts.speciallayout')
@section('title')
	{{ $event['title'] }} - berichten
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
				{{ $event['title'] }} - berichten
			</h1>
		</section>
		
		<section class="page-alignment">
			@foreach($event->messages as $message)
				<div class="message {{ $message->type }}">
					@if($message->image)
						<div class="message__image ctn--image">
							<img src="{{ asset('images/' . $message['image'] ) }}" alt="{{ $messsage['title'] }}" loading="lazy">
						</div>
					@endif
					<div>
						<h3>
							{{ $message->title }}
						</h3>
						<div>
							{{ $message->message }}
						</div>
					</div>
				</div>
			@endforeach
		</section>
	</div>
@endsection