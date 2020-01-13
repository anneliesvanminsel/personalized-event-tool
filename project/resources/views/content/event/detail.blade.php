@extends('layouts.masterlayout')
@section('title')
	evento - {{ $event['title'] }}
@endsection
@section('content')
	<section class="hero" style="background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }}">
		<div class="hero__content row row--stretch">
			@if(File::exists(public_path() . "/images/" . $event['logo']))
				<div class="ctn--image">
					<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@else
				<div class="ctn--image">
					<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
				</div>
			@endif

			<div class="hero__text">
				<div class="row is-title">
					<h1>
						{{ $event['title'] }}
					</h1>
					@if(Auth::user() && Auth::user()->role === 'organisator' && $event->organisations->contains( Auth::user()->organisation_id ))
						<div class="item__actions row row--stretch is-mobile">
							<a title="bewerken" class="is-icon" href={{route('event.update', ['event_id' => $event->id])}}>
								@svg('edit', 'is-small is-white')
							</a>
							<a title="edit event settings" class="btn is-icon" href={{route('event.edit.settings', ['event_id' => $event->id])}}>
								@svg('calendar (2)', 'is-small is-white')
							</a>
						</div>
					@endif
				</div>

				<p class="is-grow">
					{{ $event['description'] }}
				</p>

				<style>
					.btn {
						border-color: {{ $event['textcolor'] }};
						color: {{ $event['textcolor'] }}
					}

					.btn:hover {
						background-color: {{ $event['textcolor'] }};
						color: {{ $event['bkgcolor'] }};
					}
					
					.btn svg {
						fill: {{ $event['textcolor'] }};
					}
					
					.btn.is-icon:hover {
						background-color: transparent;
						color: transparent;
					}
					
					.btn.is-icon:hover svg {
						fill: {{ $event['textcolor'] }};
					}
					
					.tab__button.active {
						background-color: {{ $event['bkgcolor'] }};
						color: {{ $event['textcolor'] }};
					}
				</style>
				
				<div>
					<div class="row row--center is-mobile">
						@if($event->tickets()->exists())
							<a class="btn" href="#tickets">
								Bestel tickets
							</a>
						@endif
						@if(Auth::user()->role == "volunteer" || Auth::user()->role == "guest" )
							<form
									class="form"
									method="POST"
									action="{{ route('event.like', ['event-id' => $event['id'] ]) }}"
							>
								{{ csrf_field() }}
								
								@if(Auth::user() && $event->users->contains(Auth::user()->id))
									<button title="unlike" class="btn is-icon" type="submit">
										@svg('heart', 'is-small')
									</button>
								@else
									<button title="like" class="btn is-icon" type="submit">
										@svg('like', 'is-small')
									</button>
								@endif
							</form>
						@endif
					</div>
				</div>
				
			</div>

		</div>
		@if($event->organisations())
			<div class="hero__post">
				Georganiseerd door:
				@foreach( $event->organisations()->get() as $org)
					<a href="{{ route('organisation.detail', ['id' => $org['id']]) }}" class="link">
						{{ $org['name'] }}
					</a>
				@endforeach
			</div>
		@endif
	</section>

	@if($event->sessions()->exists())
		<section class="page-alignment schedule">
			<h1 class="schedule__title">
				Planning
			</h1>

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
	@if($event->tickets()->exists())
		<section class="page-alignment slider" id="tickets">
			<h2>
				tickets
			</h2>

			@foreach($event->tickets()->get() as $ticket)
				<input
					type="radio"
					name="slider"
					id="slide-{{ $loop->iteration }}"
					class="slider__radio"
					{{ $loop->iteration == 1 ? 'checked' : ''}}
				/>
			@endforeach

			<div class="slider__holder">
				@foreach($event->tickets()->get() as $ticket)
					<label for="slide-{{ $loop->iteration }}" class="slider__item slider__item--{{ $loop->iteration }} card" style="border-color: {{ $event['bkgcolor'] }}">
						<!-- Card Content goes here -->
						@if($ticket['type'])
							<div>
								{{ $ticket['type'] }}
							</div>
						@endif
						<h3 class="card__title">
							{{ $ticket['name'] }}
						</h3>
						<div class="card__price">
							€ {{ $ticket['price'] }}
						</div>
						@if($ticket['description'])
							<p class="card__text">
								{{ $ticket['description'] }}
							</p>
						@endif

						<a
							href="{{ route('ticket.payment', ['event_id' => $event['id'], 'ticket_id' => $ticket['id']]) }}"
							class="btn btn--full"
							style="border-color: {{ $event['bkgcolor'] }}; background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }};"
						>
							Ik wil deze
						</a>
					</label>
				@endforeach
			</div>

			<div class="bullets">
				@foreach($event->tickets()->get() as $ticket)
					<style>
						.bullets__item:hover {
							background-color: {{ $event['bkgcolor'] }};
						}

						#slide-{{$loop->iteration}}:checked ~ .bullets .bullets__item--{{$loop->iteration}}  {
							background-color: {{ $event['bkgcolor'] }};
						}
					</style>

					<label for="slide-{{ $loop->iteration }}" class="bullets__item bullets__item--{{ $loop->iteration }}"></label>
				@endforeach
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