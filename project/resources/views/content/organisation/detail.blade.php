@extends('layouts.masterlayout')
@section('title')
	evento - {{ $organisation->name }}
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			{{ $organisation['name'] }}
		</h1>
		<div class="row row--stretch spacing-top-s">
			<div>
				{{ $organisation['description'] }}
			</div>
			<div>
				@if($organisation['logo'] && File::exists(public_path() . "/images/" . $organisation['logo']))
					<div class="ctn--image">
						<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
					</div>
				@else
					<div class="ctn--image">
						<img src="https://placekitten.com/600/600" alt="{{ $organisation['name'] }}" loading="lazy">
					</div>
				@endif
					<div class="spacing-top-s">
						bedrijfstraat 45
						3000 Leuven
						+32 456 78 92 34
						bedrijf@mail.be
					</div>
			</div>
		</div>
	</section>
	@if($organisation->events()->exists())
		<section class="page-alignment spacing-top-m">
			<h2>
				Onze evenementen
			</h2>
			<div class="h-grid">
				@foreach($organisation->events()->where('status', '=', 1)->orderBy('starttime', 'ASC')->get() as $event)
					<div class="h-grid__item item row row--stretch">
						<div class="item__date" style="background-color: {{ $organisation['bkgcolor'] }}; color: {{ $organisation['textcolor'] }}">
							17 dec
						</div>

						@if(File::exists(public_path() . "/images/" . $event['logo']))
							<div class="item__image ctn--image">
								<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
							</div>
						@else
							<div class="item__image ctn--image">
								<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
							</div>
						@endif

						<div class="item__content">
							<div class="item__title">
								{{ $event->title }}
							</div>
							<div class="item__text">
								{{ $event->type }}
							</div>
						</div>
						<style>
							.btn {
								border-color: {{ $organisation['bkgcolor'] }};
								color: {{ $organisation['bkgcolor'] }}
							}

							.btn:hover {
								background-color: {{ $organisation['bkgcolor'] }};
								color: {{ $organisation['textcolor'] }};
							}
						</style>
						<div class="item__actions">
							<a class="btn" href={{route('event.detail', ['event_id' => $event->id])}}>
								Bekijk details
							</a>
							<a class="item__remind" href="#" style="color: {{ $organisation['bkgcolor'] }}">
								Herinner mij
							</a>
						</div>
					</div>
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
@endsection
