@extends('layouts.masterlayout')
@section('title')
	evento - {{ $organisation->name }}
@endsection
@section('content')
	<section class="hero" style="background-color: {{ $organisation['bkgcolor'] }}; color: {{ $organisation['textcolor'] }}">
		<div class="hero__content row row--stretch">
			@if(File::exists(public_path() . "/images/" . $organisation['logo']))
				<div class="ctn--image">
					<img src="{{ asset('images/' . $organisation['logo'] ) }}" alt="{{ $organisation['name'] }}" loading="lazy">
				</div>
			@else
				<div class="ctn--image">
					<img src="https://placekitten.com/600/600" alt="{{ $organisation['name'] }}" loading="lazy">
				</div>
			@endif

			<div class="hero__text">
				<div class="row">
					<h1>
						{{ $organisation['name'] }}
					</h1>
				</div>
			</div>
		</div>
	</section>

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
