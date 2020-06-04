@extends('layouts.masterlayout')
@section('theme')
	none
@endsection

@section('title')
	evento - {{ $organisation->name }}
@endsection

@section('content')
	<section class="section org-heading">
		
		<div class="org-heading__row row row--stretch">
			<div class="org-heading__head">
				<div class="row">
					<a href="{{ url()->previous() }}">
						@svg('left')
					</a>
					<h2 class="org-heading__title">
						{{ $organisation['name'] }}
					</h2>
				</div>
				
				<div class="org-heading__description is-grow">
					{{ $organisation['description'] }}
				</div>
			</div>
			
			<div class="org-heading__content">
				<div class="ctn--image org-heading__image">
					@if($organisation['logo'] && File::exists(public_path() . "/images/" . $organisation['logo']))
						<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
					@else
						<img src="https://placekitten.com/600/600" alt="{{ $organisation['name'] }}" loading="lazy">
					@endif
				</div>
				
				@if($organisation->address()->first())
					@php
						$address = $organisation->address()->first();
					@endphp
					<div class="org-heading__address">
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
			<div class="list" style="margin-top: 0;">
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
		</div>
		
		<div class="review">
			<div class="review__item is-blue">
				<div class="review__title row row--stretch is-mobile">
					<h5 class="is-grow">
						Fijne sfeer en fijne mensen!
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star-full') @svg('star-full') @svg('star-full') @svg('star-full') @svg('star')
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
						Goede feestjes maar te duur...
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star-full') @svg('star-full') @svg('star-full') @svg('star') @svg('star')
					</div>
				</div>
				<div class="review__text">
					De sfeer, de muziek en al is zeer goed. Goede feestjes zijn altijd duurder maar dit gaat er soms wel over.
					Ook de prijs van drank en toiletten is er soms wel erg hoog!
				</div>
			</div>
			
			<div class="review__item is-blue">
				<div class="review__title row row--stretch is-mobile">
					<h5 class="is-grow">
						VUILE DIEVEN HEBBE MIJN HANDTAS GESTOLEN
					</h5>
					<div class="row row--stretch is-mobile">
						@svg('star-full') @svg('star') @svg('star') @svg('star') @svg('star')
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
