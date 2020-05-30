@extends('layouts.masterlayout')
@section('theme')
	none
@endsection

@section('title')
	evento - {{ $organisation->name }}
@endsection

@section('content')
	<section class="section">
		<h2>
			{{ $organisation['name'] }}
		</h2>
		<div class="row row--stretch">
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
			<h3>
				Onze evenementen
			</h3>
			<div class="list">
				@foreach($organisation->events()->where('published', '=', 1)->orderBy('starttime', 'ASC')->get() as $event)
					@include('partials.listitem', $event)
				@endforeach
			</div>
		</section>
	@endif
	
	<section class="section reviews">
		<div class="row row--center">
			<h3 class="is-grow">
				Meningen van onze bezoekers
			</h3>
			<a href="#" class="btn is-disabled">
				Laat een bericht achter
			</a>
		</div>
		
		<div class="list review">
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
	@if($organisation->address()->exists())
		@php
			$address = $organisation->address()->first();
		@endphp
		@if($address['googleframe'])
			<section class="spacing-top-l">
				<div>
					{!! $address['googleframe'] !!}
				</div>
			</section>
		@endif
	@endif
@endsection
