@extends('layouts.authlayout')
@section('title')
	evento - mijn ticket
@endsection
@section('content')
	<div class="ticket">
		<div class="ctn--image ticket__image">
			<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
		</div>
		<div class="ticket__qrcode">
			@desktop
				{!! QrCode::size(250)->generate(route('ticket.scan', ['ticket_id' => $ticket['id'], 'user_id' => Auth::user()->id])); !!}
			@elsedesktop
				{!! QrCode::size(150)->generate(route('ticket.scan', ['ticket_id' => $ticket['id'], 'user_id' => Auth::user()->id])); !!}
			@enddesktop
		</div>
		
		<section class="ticket__content page-alignment">
			<h1>
				{{ $event['title'] }} - {{ $ticket['name'] }}
			</h1>
			
			<p class="spacing-top-m ticket__price">
				Prijs: € {{ $ticket['price'] }}
			</p>
			
			<p class="spacing-top-m ticket__event-description">
				{{ $event->description }}
			</p>
		</section>
	</div>

@endsection