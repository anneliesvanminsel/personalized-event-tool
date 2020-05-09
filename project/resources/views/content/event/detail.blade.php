@extends('layouts.masterlayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	
	<style>
		.hero:before {
			background-image: linear-gradient(to right, {{ $event['prim-color'] }}, {{ $event['sec-color'] }});
		}
	</style>
	
	<div class="hero">
		<div class="hero__image">
			@if(File::exists(public_path() . "/images/" . $event['image']))
				<img src="{{ asset('images/' . $event['image'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/1000/1000" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</div>
		
		<div class="hero__actions row">
			<div class="hero__organisation row">
				@if($event->organisations()->exists())
					Georganiseerd door:
					@foreach($event->organisations()->get() as $organisation)
						<a href="">
							 {{ $organisation->name }}
						</a>
					@endforeach
				@endif
			</div>
			
			<button title="download" class="button is-icon" type="submit">
				@svg('download', 'is-btn is-white')
			</button>
			<form
				class="form"
				method="POST"
				action="{{ route('event.like', ['event-id' => $event['id'] ]) }}"
			>
				{{ csrf_field() }}
				@if(Auth::user() && $event->users->contains(Auth::user()->id))
					<button title="unlike" class="button is-icon" type="submit">
						@svg('heart-full', 'is-btn is-heart')
					</button>
				@else
					<button title="like" class="button is-icon" type="submit">
						@svg('heart-line', 'is-btn is-heart')
					</button>
				@endif
			</form>
		</div>
		
		<div class="hero__content">
			<h1 class="hero__title">
				{{ $event['title'] }}
			</h1>
			<div class="hero__description">
				{{ $event['description'] }}
			</div>
		</div>
	</div>
	
	@if($event->tickets()->exists())
		<section class="section is-pull-up">
			<div class="row">
				<h3 class="is-white hero__subtitle">
					tickets
				</h3>
				@if($event->address()->exists())
					<div class="row hero__location">
						@svg('location', 'is-white')
						{{ $event->address()->first()->locationname }}, {{ $event->address()->first()->city }}
					</div>
				@endif
			</div>
			
			<div class="card--container">
				@foreach($event->tickets()->get() as $ticket)
					@include('partials.ticket', $ticket)
				@endforeach
			</div>
		</section>
	@endif
	
	
	<section class="photowall">
		<ul class="photolist">
			@php
				if($event->username) {
					$response = file_get_contents('https://instagram.com/'.$event->username.'/?__a=1');
				} else {
					$response = file_get_contents('https://instagram.com/evento_platform/?__a=1');
				}
				$data = json_decode($response);
			@endphp
			@foreach($data->graphql->user->edge_owner_to_timeline_media->edges as $node)
				<li class="photolist__item">
					<img
						src="{{ $node->node->display_url }}"
						alt="{{ $node->node->accessibility_caption }}"
						loading="lazy"
					>
				</li>
			@endforeach
		</ul>
	</section>

	@if($event->sessions()->exists())
		<section class="section schedule">
			@if($event->schedule === 'timeline')
				@include('content.schedule.timeline')
			@elseif($event->schedule === 'timetable')
				@include('content.schedule.timetable')
			@else
				@include('content.schedule.table')
			@endif
			
		</section>
	@endif
	
	
	@if($event->address()->first())
		@php
			$address = $event->address()->first();
		@endphp
		<section class="spacing-top-l">
			<div>
				{!! $address['googleframe'] !!}
			</div>
		</section>
	@endif
	<script src="{{ asset('js/openTabs.js') }}"></script>
@endsection