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
	<section class="grid">
		<h2>
			first thing
		</h2>
		<div class="row">
			<div class="ctn--image">
				<img src="https://images.pexels.com/photos/2422278/pexels-photo-2422278.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
			<div>
				<div>
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
	<section class="grid">
		<h2>
			second thing
		</h2>
		<div class="row">
			<div>
				<div>
					Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
					snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
					croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
				</div>
				<button class="btn">
					meer info
				</button>
			</div>
			<div class="ctn--image">
				<img src="https://images.pexels.com/photos/34600/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
		</div>
	</section>
	<section class="grid">
		<h2>
			third thingg
		</h2>
		<div class="row">
			<div class="ctn--image">
				<img src="https://images.pexels.com/photos/336948/pexels-photo-336948.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
			</div>
			<div>
				<div>
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
	<section class="grid">
		<h2>
			Een oplossing die bij je past
		</h2>
		<div>
			@foreach($subs as $sub)
				<div>
					<h3>
						{{ $sub['title'] }}
					</h3>
					<div>
						<p>
							{{ $sub['description'] }}
						</p>
						<div>
							€ {{ $sub['price'] }}
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</section>
@endsection