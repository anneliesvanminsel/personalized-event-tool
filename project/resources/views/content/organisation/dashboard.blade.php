@extends('layouts.masterlayout')
@section('title')
	evento - dashboard
@endsection
@section('content')
	<style>
		.btn {
			border-color: {{ $organisation['bkgcolor'] }};
			color: {{ $organisation['bkgcolor'] }}
							}
		
		.btn:hover {
			background-color: {{ $organisation['bkgcolor'] }};
			color: {{ $organisation['textcolor'] }};
			border-color: {{ $organisation['bkgcolor'] }};
		}
		
		.btn.is-icon:hover {
			background-color: transparent;
			color: transparent;
		}
		
		.btn.is-icon:hover svg {
			fill: {{ $organisation['bkgcolor'] }};
		}
	</style>
	
	<section class="section">
		<div class="row row--stretch">
			<h1 class="is-grow">
				{{ $organisation['name'] }} - Admin
			</h1>
			<a href="{{ route('organisation.update', ['organisation_id'=> $organisation['id']]) }}" class="btn is-icon">
				@svg('edit')
			</a>
		</div>
		
		<div class="spacing-top-m row row--stretch">
			<a href="#events" class="btn">Mijn evenementen</a>
			<a href="{{ route('organisation.detail', ['organisation_id'=> $organisation['id']]) }}" class="btn btn--blue">Mijn detail-pagina</a>
		</div>
	</section>
	<section class="section" id="events">
		<div class="row row--stretch">
			<h2>
				Mijn evenementen
			</h2>
			<a href="{{ route('event.create', ['organisation_id' => $organisation['id']]) }}" class="btn btn--small">
				nieuw event
			</a>
		</div>
		<div class="list">
			@php
				$events = $organisation->events()->orderBy('starttime', 'ASC')->paginate(10);
			@endphp
			@foreach($events as $event)
				@include('partials.listitem')
			@endforeach
			<div>
				{{ $events->links() }}
			</div>
		</div>
	</section>
@endsection