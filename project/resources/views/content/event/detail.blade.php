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
				<div class="row">
					<h1>
						{{ $event['title'] }}
					</h1>
				</div>

				<p>
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
				</style>
				@if($event->tickets)
					<a class="btn" href="#tickets">
						Bestel tickets
					</a>
				@endif
			</div>

		</div>
		@if($event->organisations())
			<div class="hero__post">
				Georganiseerd door:
				@foreach( $event->organisations()->get() as $org)

					<span>
						{{ $org['name'] }}
					</span>
				@endforeach
			</div>
		@endif
	</section>

	@if($event->sessions()->exists())
		<section class="page-alignment schedule">
			<h1 class="schedule__title">
				Planning
			</h1>

			<div class="schedule__content">
				<div class="schedule__headcontainer row row--stretch">
					@foreach($event->sessions()->get() as $session)
						<div class="schedule__heading">
							<div>
								{{ $session['name'] }}
							</div>

							<div>
								{{ $session['date'] }}
							</div>
						</div>
					@endforeach
				</div>
				@foreach($event->sessions()->get() as $session)
					@if($session->schedules()->exists())
						<div class="table">
							<div class="table__heading row row--stretch" style="border-color: {{ $event['bkgcolor'] }}">
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
										background-color: {{ $event['bkgcolor'] }}55;
									}
								</style>

							<!-- laatste twee cijfers zijn opacity -->
								@foreach($session->schedules()->get() as $sched)
									<div class="table__item row row--stretch">
										<div class="">
											{{ $sched['starttime'] }} - {{ $sched['endtime'] }}
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
						</div>
					@endif
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

						<button class="btn btn--full" style="border-color: {{ $event['bkgcolor'] }}; background-color: {{ $event['bkgcolor'] }}; color: {{ $event['textcolor'] }};">
							Ik wil deze
						</button>
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
@endsection