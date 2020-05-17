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
			$events = $user->favevents()->paginate(3);
		@endphp
		
		<section class="content">
			<div class="row row--center">
				<h3>
					mijn favoriete evenementen
				</h3>
				{{ $events->links('vendor.pagination.simple') }}
			</div>
			
			<div class="card--container">
				@foreach($events as $event)
					@include('partials.card')
				@endforeach
			</div>
		</section>
	</div>
@endsection