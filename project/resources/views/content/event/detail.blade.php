@extends('layouts.masterlayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<style>
		.hero:before {
			background-image: linear-gradient(to right, {{ $event['bkgcolor'] }}, {{ $event['textcolor'] }});
		}
	</style>
	
	<div class="hero">
		<div class="hero__image">
			@if(File::exists(public_path() . "/images/" . $event['logo']))
				<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/1000/1000" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</div>
		
		<div class="hero__actions row">
			<div class="hero__organisation">
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
				<h3 class="is-white">
					tickets
				</h3>
				@if($event->address()->exists())
					<div class="row">
					
						<div class="card__text row">
							@svg('location', 'is-white')
							{{ $event->address()->first()->locationname }}, {{ $event->address()->first()->city }}
						</div>
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
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2399097/pexels-photo-2399097.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2311713/pexels-photo-2311713.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2897462/pexels-photo-2897462.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2705089/pexels-photo-2705089.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2284004/pexels-photo-2284004.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2820898/pexels-photo-2820898.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/1983046/pexels-photo-1983046.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2952834/pexels-photo-2952834.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/518389/pexels-photo-518389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" loading="lazy">
			</li>
		</ul>
	</section>

@if($event->sessions()->exists())
<section class="section schedule">
	<h3 class="schedule__title">
		Planning
	</h3>

	<div class="tab spacing-top-s">
		<div class="tab__heading">
			@foreach($event->sessions()->get() as $session)
				<button class="tab__button tab__links {{$loop->iteration === 1 ? 'active' : ''}}" onclick="openTabs(event, {{ $session['id'] }})">
					{{ date('d/m', strtotime( $session['date'])) }}
				</button>
			@endforeach
		</div>
		
		<div id="tab__container">
			@foreach($event->sessions()->get() as $session)
				<div class="tab__content" id="{{ $session['id'] }}" {{$loop->iteration === 1 ? 'style=display:'.'block' : ''}}>
					@if($session->schedules()->exists())
						<div class="table__heading row row--stretch is-mobile" style="border-color: {{ $event['bkgcolor'] }}">
							<div>
								Uur
							</div>
							<div>
								Wat
							</div>
							<div>
								Waar
							</div>
						</div>
						<div class="table__content">
							<style>
								.table__item:nth-child(odd) {
									background-color: {{ $event['bkgcolor'] }}55; /* laatste twee cijfers zijn opacity*/
								}
							</style>
							
							@foreach($session->schedules()->get() as $sched)
								<div class="table__item row row--stretch is-mobile">
									<div class="">
										{{ \Carbon\Carbon::parse($sched['starttime'])->format('H:i') }}
										@if($sched['endtime'])
											- {{ \Carbon\Carbon::parse($sched['endtime'])->format('H:i')}}
										@endif
									</div>
									<div class="">
										<div class="">
											{{ $sched['title'] }}
										</div>
										<p class="">
											{{ $sched['description'] }}
										</p>
									</div>
									<div class="">
										{{ $sched['location'] }}
									</div>
								</div>
							@endforeach
						</div>
					@else
						<p>
							Er is nog geen planning toegevoegd.
						</p>
					@endif
				</div>
			@endforeach
		</div>
	</div>
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