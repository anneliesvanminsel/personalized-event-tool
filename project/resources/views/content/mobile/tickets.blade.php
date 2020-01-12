@extends('layouts.masterlayout')
@section('title')
	evento
@endsection
@section('content')
	<div class="page-alignment">
		@if(Auth::user())
			@if(Auth::user()->tickets()->exists())
				<section class="spacing-top-s" id="events">
					<h1>
						Mijn tickets
					</h1>
					<div class="v-grid">
						@foreach(Auth::user()->tickets()->get() as $ticket)
							@php
								$event = $ticket->event;
							@endphp
							<a
									class="h-grid__item item"
									href="{{ route('ticket.detail', [ 'ticket_id' => $ticket['id'], 'event' => $ticket['event_id'] ]) }}"
							>
								
								<div class="item__date bkg-red">
									{{  date('d M', strtotime( $event['starttime'])) }}
									
									@php
										$attendance = $ticket->users()->findOrFail(Auth::user()->id, ['user_id'])->pivot->attendance;
									@endphp
									
									@if($attendance === 1)
										@svg('tick', 'is-check is-green is-small')
									@endif
								</div>
								<div class="ctn--image item__image">
									<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
								</div>
								<div class="item__title item__text">
									{{ $event->title }}
								</div>
							</a>
						@endforeach
					</div>
				</section>
			@else
				<section class="spacing-top-s" id="events">
					<h1>
						Mijn tickets
					</h1>
					<div class="">
						Je hebt nog geen tickets toegevoegd! <br>
						Voeg snel een ticket toe!
					</div>
				</section>
			@endif
		@else
			<section class="spacing-top-s" id="events">
				Er is iets misgegaan. <br>
				Ben je zeker dat je bent aangemeld?
			</section>
		@endif
	</div>
@endsection