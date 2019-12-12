@extends('layouts.masterlayout')
@section('title')
	eventify - {{ $event['title'] }}
@endsection
@section('content')
	<section class="slideshow">
		<div class="slideshow__content row row--stretch">
			<div class="ctn--image">
				<img src="https://images.pexels.com/photos/801863/pexels-photo-801863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
			<div class="slideshow__text">
				<h1>
					{{ $event['title'] }}
				</h1>
				<p>
					{{ $event['description'] }}
				</p>
				<a class="btn btn--white" href="#tickets">
					Bestel tickets
				</a>
			</div>
		</div>
	</section>
	<section class="grid">
		<h1>
			Planning
		</h1>
		<div>
			dagen
		</div>
		<div>
			uren
		</div>
	</section>
	<section class="photowall">
		<ul class="photolist">
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2399097/pexels-photo-2399097.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2311713/pexels-photo-2311713.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2897462/pexels-photo-2897462.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2705089/pexels-photo-2705089.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2284004/pexels-photo-2284004.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2820898/pexels-photo-2820898.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/1983046/pexels-photo-1983046.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/2952834/pexels-photo-2952834.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
			<li class="photolist__item">
				<img src="https://images.pexels.com/photos/518389/pexels-photo-518389.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</li>
		</ul>
	</section>
	<section class="grid" id="tickets">
		<h2>
			tickets
		</h2>

		@foreach($tickets as $ticket)
			<input
				type="radio"
				name="slider"
				id="slide-{{ $loop->iteration }}"
				class="slider__radio"
				{{ $loop->iteration == 2 ? 'checked' : ''}}
			/>
		@endforeach

		<div class="slider__holder">
			@foreach($tickets as $ticket)
				<label for="slide-{{ $loop->iteration }}" class="slider__item slider__item--{{ $loop->iteration }} card">
					<!-- Card Content goes here -->
					<h3 class="card__title">
						{{ $ticket['name'] }}
					</h3>
					<div class="card__price">
						€ {{ $ticket['price'] }}
					</div>
					<p class="card__text">
						{{ $ticket['description'] }}
					</p>

					<button class="btn btn--full">
						Ik wil deze
					</button>
				</label>
			@endforeach

		</div><!-- slider__holder -->
		<div class="bullets">
			@foreach($tickets as $ticket)
				<label for="slide-{{ $loop->iteration }}" class="bullets__item bullets__item--{{ $loop->iteration }}"></label>
			@endforeach
		</div>

	</section>
@endsection