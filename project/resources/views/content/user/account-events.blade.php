@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<div class="section account with-space-top">
		@include('partials.account-sidebar')
		
		@php
			$events = $user->savedevents()->paginate(3);
		@endphp
		
		<section class="content" id="account">
			<div class="row row--center">
				<h3>
					mijn opgeslagen evenementen
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
						Nog geen evenementen opgeslagen. <br>
						Verken <a href="{{route('index')}}" class="link">onze evenementen</a>!
					</p>
				@endif
			</div>
		</section>
	</div>
@endsection