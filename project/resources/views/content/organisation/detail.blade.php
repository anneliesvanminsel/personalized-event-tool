@extends('layouts.masterlayout')
@section('theme')
	none
@endsection

@section('title')
	evento - {{ $organisation->name }}
@endsection

@section('content')
	<section class="section">
		<h1>
			{{ $organisation['name'] }}
		</h1>
		<div class="row row--stretch spacing-top-s">
			<div class="is-grow">
				{{ $organisation['description'] }}
			</div>
			<div class="org-heading">
				@if($organisation['logo'] && File::exists(public_path() . "/images/" . $organisation['logo']))
					<div class="ctn--image">
						<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
					</div>
				@else
					<div class="ctn--image">
						<img src="https://placekitten.com/600/600" alt="{{ $organisation['name'] }}" loading="lazy">
					</div>
				@endif
				@if($organisation->address()->first())
					@php
						$address = $organisation->address()->first();
					@endphp
					<div class="spacing-top-s">
						@if( $address->locationname)
							<p>
								{{ $address->locationname }}
							</p>
						@endif
						<p>
							{{ $address->street }} {{ $address->streetnumber }} {{ $address->box }}
						</p>
						<p>
							{{ $address->postalcode }} {{ $address->city }}
						</p>
						@if( $address->region)
							<p>
								{{ $address->region }}
							</p>
						@endif
						<p>
							{{ $address->country }}
						</p>
					</div>
				@endif
			</div>
		</div>
	</section>
	@if($organisation->events()->exists())
		<section class="section">
			<h2>
				Onze evenementen
			</h2>
			<div class="list">
				@foreach($organisation->events()->where('published', '=', 1)->orderBy('starttime', 'ASC')->get() as $event)
					@include('partials.listitem', $event)
				@endforeach
			</div>
		</section>
	@endif

	<section class="photowall">
		<ul class="photolist">
			<li class="photolist__item">
				<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="" loading="lazy">
			</li>
		</ul>
	</section>
	
	<section class="section reviews">
		<h2>
			Meningen van onze bezoekers
		</h2>
		<div class="review">
			<div class="review__item is-blue">
				<div class="review__title row row--stretch is-mobile">
					<h5 class="is-grow">
						Fijne sfeer en fijne mensen!
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star')
					</div>
				</div>
				<div class="review__text">
					Gisterenavond ben ik hier geen feesten en de barmannen en -vrouwen
					zijn super vriendelijk en mixen de beste drankjes. Ik en mijn vriendinnen hebben ons rot geamuseerd!
				</div>
			</div>
			
			<div class="review__item is-blue">
				<div class="review__title row row--stretch is-mobile">
					<h5 class="is-grow">
						Titel
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star') @svg('star')
					</div>
				</div>
				<div class="review__text">
					Cupcake lollipop chocolate. Dessert chupa chups cotton candy brownie dessert. Tootsie roll sesame
					snaps pie sesame snaps candy canes jelly-o biscuit topping. Soufflé sesame snaps tootsie roll gummies
					croissant pastry. Biscuit candy biscuit jujubes gingerbread muffin cotton candy cake.
				</div>
			</div>
			
			<div class="review__item is-blue">
				<div class="review__title row row--stretch is-mobile">
					<h5 class="is-grow">
						VUILE DIEVEN HEBBE MIJN HANDTAS GESTOLEN
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star') @svg('star') @svg('star') @svg('star')
					</div>
				</div>
				<div class="review__text">
					Ze hebben mijn handtas gestolen! En het personeel geeft er niet om! Niemand wou me helpen!!!!
					Klacht ingediend bij de politie… nooit meer ga ik hier!
				</div>
			</div>
		</div>
	</section>
	@if($organisation->address()->first())
		@php
			$address = $organisation->address()->first();
		@endphp
		<section class="spacing-top-l">
			<div>
				{!! $address['googleframe'] !!}
			</div>
		</section>
	@endif
@endsection
