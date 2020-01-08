@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="page-alignment">
		<section >
			ACCOUNT BITCHES
			{{ $user['name'] }}
			{{ $user['email'] }}
			{{ $user['role'] }}
		</section>
		
		@if($user->tickets()->exists())
			<section class="spacing-top-m">
				<h1>
					Mijn tickets
				</h1>
				<div class="h-grid">
					@foreach($user->tickets()->get() as $ticket)
						@php
							$event = $ticket->event;
						@endphp
						<a
							class="row row--stretch h-grid__item item"
							href="{{ route('ticket.detail', [ 'ticket_id' => $ticket['id'], 'event' => $ticket['event_id'] ]) }}"
						>
							<div class="item__date bkg-red">
								{{  date('d M', strtotime( $event['starttime'])) }}
							</div>
							<div class="is-grow">
								<p class="item__title item__text">{{ $event->title }}</p>
								<p class="item__text">{{ $event->description }}</p>
							</div>
							<div class="ctn--image item__image">
								<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
							</div>
							
							
						</a>
					@endforeach
				</div>
			</section>
		@endif
	
	</div>
@endsection