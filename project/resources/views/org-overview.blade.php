@extends('layouts.masterlayout')
@section('title')
	e - organiseren
@endsection
@section('content')
	<div class="hero">
		<div class="hero__image">
			<img src="{{ asset('images/festival.jpg') }}" alt="" loading="lazy">
		</div>
		
		<div class="hero__content">
			<h1 class="hero__title">
				Breng je evenementen tot een hoger niveau
			</h1>
			<div class="hero__description">
				Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
				snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
				croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
			</div>
		</div>
	</div>
	
	<section class="section is-pull-up">
		<h3 class="is-white">
			Een oplossing die bij je past
		</h3>
		<div class="card--container">
			@foreach($subs as $sub)
				<div class="card ticket sub">
					<div class="card__like">
						<a href="#feature-{{$loop->iteration}}">
							@svg('info')
						</a>
					</div>
					
					<div class="card__content sub__content">
						<h4 class="card__title ticket__type">
							{{ $sub['title'] }}
						</h4>
						<div class="card__price ticket__price">
							€ {{ $sub['price'] }}
						</div>
						<div>
							{!! $sub['description'] !!}
						</div>
					</div>
					
					<div class="card__actions ticket__actions">
						<a class="btn btn--primary" href={{ route('event.detail', ['event_id' => $sub->id]) }}>
							ik wil dit pakket
						</a>
					</div>
				</div>
			@endforeach
		
		</div>
	</section>
	
	@foreach($subs as $sub)
		<section class="page-alignment spacing-top-m" id="feature-{{$loop->iteration}}">
			<div class="section row row--stretch">
				
				@if($loop->odd)
					<div class="ctn--image section__image">
						<img src="https://images.pexels.com/photos/2422278/pexels-photo-2422278.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
					</div>
				@endif
				<div class="section__content">
					<h2>
						{{ $sub['title'] }}
					</h2>
					<div class="section__text">
						Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
						snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
						croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
					</div>
				</div>
				@if($loop->even)
					<div class="ctn--image section__image">
						<img src="https://images.pexels.com/photos/2422278/pexels-photo-2422278.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
					</div>
				@endif
			</div>
		</section>
	@endforeach
	
@endsection