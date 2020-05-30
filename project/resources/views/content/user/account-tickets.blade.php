@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="section account with-space-top">
		@include('partials.account-sidebar')
		
		@php
			$tickets = $user->tickets()->paginate(3);
		@endphp
		
		<section class="content" id="account">
			<div class="row row--center">
				<h3>
					mijn tickets
				</h3>
				{{ $tickets->links('vendor.pagination.simple') }}
			</div>
			
			<div class="card--container">
				@if($tickets->count() > 0)
					@foreach($tickets as $ticket)
						@php
							$attendance = $ticket->users()->findOrFail(Auth::user()->id, ['user_id'])->pivot->attendance;
						@endphp
						
						@if($attendance === 1)
							@svg('tick', 'is-check is-green is-small')
						@endif
						@include('content.ticket.card')
					@endforeach
				@else
					<p>
						Nog geen tickets gekocht. <br>
						Verken <a href="{{route('index')}}" class="link">onze evenementen</a> en koop nu jouw tickets!
					</p>
				@endif
			</div>
		</section>
	</div>
@endsection