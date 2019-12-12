@extends('layouts.masterlayout')
@section('title')
	e - organiseren
@endsection
@section('content')
	<section class="grid">
		<h1>
			Breng je evenementen tot een hoger niveau
		</h1>
		<p>
			Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
			snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
			croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
		</p>
	</section>
	<section class="grid section" id="feature-1">
		<div class="row row--stretch">
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
				<button class="btn btn--ghost">
					meer info
				</button>
			</div>
		</div>
	</section>
	<section class="grid section section--red" id="feature-2">
		<div class="row row--stretch">
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
	<section class="grid section" id="feature-3">
		<div class="row row--stretch">
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
				<button class="btn">
					meer info
				</button>
			</div>
		</div>
	</section>
	<section class="section slider" id="price">
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
				<label for="slide-{{ $loop->iteration }}" class="slider__item slider__item--{{ $loop->iteration }} card">
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

					<button class="btn btn--full">
						Ik wil deze
					</button>
				</label>
			@endforeach

		</div><!-- slider__holder -->
		<div class="bullets">
			@foreach($subs as $sub)
				<label for="slide-{{ $loop->iteration }}" class="bullets__item bullets__item--{{ $loop->iteration }}"></label>
			@endforeach
		</div>

	</section>
	<!--section class="grid section slider">

		<div class="radio">
			@foreach($subs as $sub)
				<input
					type="radio"
					name="slider"
					id="slide-{{ $loop->iteration }}"
					class="slider__radio"
					{{ $loop->iteration == 2 ? 'checked' : ''}}
				/>
			@endforeach
		</div>
		<div class="slider__holder">
			@foreach($subs as $sub)
				<label for="slide-{{ $loop->iteration }}" class="slider__item slider__item--{{ $loop->iteration }} card">
					<div class="slider__item-content">
						<h3 class="">
							{{ $sub['title'] }}
						</h3>
						<div class="slider__item-price">
							€ {{ $sub['price'] }}
						</div>
						<p class="slider__item-text">
							{{ $sub['description'] }}
						</p>

						<button class="button">
							Ik wil deze
						</button>
					</div>
				</label>
			@endforeach
		</div>

	</section-->
@endsection