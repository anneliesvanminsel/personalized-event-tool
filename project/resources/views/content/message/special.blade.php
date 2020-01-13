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
				<a href="{{ route('event.special', ['event' => $event['id']] ) }}">
					{{ $event['title'] }}
				</a>
			</h1>
		</section>
		
		<section class="page-alignment spacing-top-m">
			@foreach($event->messages as $message)
				<div class="message {{ $message->type }}">
					@if($message->image)
						<div class="message__image ctn--image">
							<img src="{{ asset('images/' . $message['image'] ) }}" alt="{{ $messsage['title'] }}" loading="lazy">
						</div>
					@endif
					<div class="message__content">
						@if($message->title)
							<h3 class="message__title">
								{{ $message->title }}
							</h3>
						@endif
						<div class="message__text">
							{{ $message->message }}
						</div>
					</div>
				</div>
			@endforeach
		</section>
	</div>
@endsection