@extends('layouts.masterlayout')
@section('title')
	evento - mijn ticket
@endsection
@section('content')
	<div class="hero ticket-detail">
		<div class="hero__image ticket-detail__image">
			<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
		</div>
		<div class="section ticket--container">
			<div class="ticket">
				<div class="ticket__left">
					<div>
						<p class="ticket__type">
							{{ $ticket['type'] }}
						</p>
						<p class="ticket__price">
							€ {{ $ticket['price'] }}
						</p>
					</div>
					<div class="ticket__qrcode">
						@desktop
							{!! QrCode::size(250)->generate(route('ticket.scan', ['ticket_id' => $ticket['id'], 'user_id' => Auth::user()->id])); !!}
						@elsedesktop
							{!! QrCode::size(150)->generate(route('ticket.scan', ['ticket_id' => $ticket['id'], 'user_id' => Auth::user()->id])); !!}
						@enddesktop
						
						@php
							$attendance = $ticket->users()->findOrFail(Auth::user()->id, ['user_id'])->pivot->attendance;
						@endphp
						
						@if($attendance === 1)
							@svg('tick', 'is-check is-green')
						@endif
					</div>
					<div class="ticket__info">
						<p>
							@svg('calendar') {{ $ticket['date'] }}
						</p>
						<p>
							@svg('location') {{ $event->address->first()->locationname ? $event->address->first()->locationname . ',' : '' }} {{ $event->address->first()->city }}
						</p>
					</div>
				</div>
				<section class="ticket__content">
					<h1>
						{{ $event['title'] }}
					</h1>
					<p class="spacing-top-m ticket__event-description">
						{{ $event->description }}
					</p>
				</section>
			</div>
		</div>
	</div>
@endsection