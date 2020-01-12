@extends('layouts.masterlayout')
@section('title')
	e - organiseren
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			Breng je evenementen tot een hoger niveau
		</h1>
		<p>
			Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
			snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
			croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
		</p>
	</section>
	<section class="page-alignment spacing-top-m" id="feature-1">
		<div class="section row row--stretch">
			<div class="ctn--image section__image">
				<img src="https://images.pexels.com/photos/2422278/pexels-photo-2422278.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
			<div class="section__content">
				<h2>
					first thing
				</h2>
				<div class="section__text">
					Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
					snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
					croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
				</div>
				<button class="btn btn--ghost btn--blue">
					meer info
				</button>
			</div>
		</div>
	</section>
	<section class="spacing-top-m section--blue section" id="feature-2">
		<div class="page-alignment row row--stretch">
			<div class="section__content section__content--right">
				<h2>
					second thing
				</h2>
				<div class="section__text">
					Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
					snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
					croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
				</div>
				<button class="btn btn--ghost btn--white">
					meer info
				</button>
			</div>
			<div class="ctn--image section__image">
				<img src="https://images.pexels.com/photos/34600/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
		</div>
	</section>
	<section class="page-alignment spacing-top-m" id="feature-3">
		<div class="section row row--stretch">
			<div class="ctn--image section__image">
				<img src="https://images.pexels.com/photos/336948/pexels-photo-336948.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
			<div class="section__content">
				<h2>
					third thingg
				</h2>
				<div class="section__text">
					Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
					snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
					croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
				</div>
				<button class="btn btn--blue">
					meer info
				</button>
			</div>
		</div>
	</section>
	<section class="slider page-alignment" id="price">
		<h2>
			Een oplossing die bij je past
		</h2>
		@foreach($subs as $sub)
			<input
				type="radio"
				name="slider"
				id="slide-{{ $loop->iteration }}"
				class="slider__radio"
				{{ $loop->iteration == 2 ? 'checked' : ''}}
			/>
		@endforeach

		<div class="slider__holder">
			@foreach($subs as $sub)
				<label for="slide-{{ $loop->iteration }}" class="slider__item slider__item--{{ $loop->iteration }} card is-blue">
					<!-- Card Content goes here -->
					<h3 class="card__title">
						{{ $sub['title'] }}
					</h3>
					<div class="card__price">
						€ {{ $sub['price'] }}
					</div>
					<p class="card__text">
						{{ $sub['description'] }}
					</p>

					<a class="btn btn--full is-blue" href="{{ route('organisation.create', ['subscription_id' => $sub->id]) }}">
						Ik wil deze
					</a>
				</label>
			@endforeach

		</div>

		<div class="bullets">
			@foreach($subs as $sub)
				<label for="slide-{{ $loop->iteration }}" class="bullets__item bullets__item--{{ $loop->iteration }} is-blue"></label>
			@endforeach
		</div>
	</section>
@endsection