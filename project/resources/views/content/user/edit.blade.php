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
		
		<section class="content">
			<div class="row row--center">
				<h3>
					mijn opgeslagen evenementen
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