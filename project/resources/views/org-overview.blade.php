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
		<article class="article--container {{ $loop->even ? 'is-purple' : '' }}" id="feature-{{$loop->iteration}}">
			<div class="article row row--stretch">
				@if($loop->even)
					<div class="ctn--image article__image">
						<img src="{{ asset('images/abo-' . $loop->iteration . '.jpg') }}" alt="{{ $sub['title'] }}-abonnement">
					</div>
				@endif
				<div class="article__content">
					<h3 class="article__title">
						{{ $sub['title'] }}
					</h3>
					<ul class="ul article__text {{ $loop->even ? 'is-white' : '' }}">
						{!! $sub->items !!}
					</ul>
				</div>
				@if($loop->odd)
					<div class="ctn--image article__image">
						<img src="{{ asset('images/abo-' . $loop->iteration . '.jpg') }}" alt="{{ $sub['title'] }}-abonnement">
					</div>
				@endif
			</div>
		</article>
	@endforeach
	
@endsection