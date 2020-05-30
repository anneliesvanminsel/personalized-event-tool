@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="section account with-space-top">
		@include('partials.account-sidebar')
		
		@php
			$events = $user->favevents()->paginate(3);
		@endphp
		
		<section class="content" id="account">
			<div class="row row--center">
				<h3>
					mijn favoriete evenementen
				</h3>
				{{ $events->links('vendor.pagination.simple') }}
			</div>
			
			<div class="card--container">
				@if($events->count() > 0)
					@foreach($events as $event)
						@include('partials.card')
					@endforeach
				@else
					<p>
						Nog geen evenementen leuk gevonden. <br>
						Verken <a href="{{route('index')}}" class="link">onze evenementen</a>!
					</p>
				@endif
			</div>
		</section>
	</div>
@endsection