@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="section account with-space-top">
		<section class="sidebar">
			<h3 class="sidebar__title">
				{{ $user['name'] }}
			</h3>
			
			<div class="sidebar__section">
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
						href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
					>
						mijn tickets
					</a>
				</div>
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.favorites') === 0) ? 'active' : '' }}"
						href="{{ route('user.favorites', ['user_id' => Auth::user()->id]) }}"
					>
						mijn favorieten
					</a>
				</div>
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.events') === 0) ? 'active' : '' }}"
						href="{{ route('user.events', ['user_id' => Auth::user()->id]) }}"
					>
						mijn evenementen
					</a>
				</div>
			</div>
			
			<div>
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
						href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
					>
						account bewerken
					</a>
				</div>
				<div class="sidebar__item">
					<a
						class="sidebar__link {{ (strpos(Route::currentRouteName(), 'user.account') === 0) ? 'active' : '' }}"
						href="{{ route('user.account', ['user_id' => Auth::user()->id]) }}"
					>
						account instellingen
					</a>
				</div>
				<div class="sidebar__item">
					<a class="sidebar__link"
					   href="{{ route('logout') }}"
					   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
					>
						afmelden
					</a>
					
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</section>
		
		@php
			$tickets = $user->tickets()->paginate(3);
		@endphp
		
		<section class="content">
			<div class="row row--center">
				<h3>
					mijn tickets
				</h3>
				{{ $tickets->links('vendor.pagination.simple') }}
			</div>
			
			<div class="card--container">
				@foreach($tickets as $ticket)
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
								<p class="item__text is-row row">Bekijk het ticket @svg('right', 'is-small')</p>
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