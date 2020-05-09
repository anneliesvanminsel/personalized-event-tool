@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="section account">
		<section class="sidebar">
			<h3 class="sidebar__title">
				{{ $user['name'] }}
			</h3>
			
			<div class="sidebar__section">
				<div>
					mijn tickets
				</div>
				<div>
					mijn favorieten
				</div>
				<div>
					mijn evenementen
				</div>
			</div>
			
			<div>
				<div>
					account bewerken
				</div>
				<div>
					account instellingen
				</div>
				<div>
					afmelden
				</div>
			</div>
		</section>
		
		<section>
			<h3>
				mijn tickets
			</h3>
			<div class="card--container">
				@foreach($user->tickets()->get() as $ticket)
					@include('content.ticket.card')
				@endforeach
			</div>
		</section>
	</div>
		
		
		@if($user->tickets()->exists())
			<section class="spacing-top-m" id="tickets">
				<h2>
					Mijn tickets
				</h2>
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
								
								@php
									$attendance = $ticket->users()->findOrFail(Auth::user()->id, ['user_id'])->pivot->attendance;
								@endphp
								
								@if($attendance === 1)
									@svg('tick', 'is-check is-green is-small')
								@endif
							</div>
							<div class="is-grow item__column">
								<p class="item__title item__text">{{ $event->title }}</p>
								<p class="item__text is-grow">{{ $event->description }}</p>
								<p class="item__text is-row row">Bekijk het ticket @svg('right-arrow', 'is-small')</p>
							</div>
							<div class="ctn--image item__image">
								<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
							</div>
						</a>
					@endforeach
				</div>
			</section>
		@endif
@endsection