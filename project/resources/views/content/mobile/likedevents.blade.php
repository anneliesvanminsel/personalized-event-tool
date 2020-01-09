@extends('layouts.masterlayout')
@section('title')
	evento
@endsection
@section('content')
	@if(Auth::user() && Auth::user()->events()->exists())
		<section class="spacing-top-s" id="events">
			<h2>
				Mijn evenementen
			</h2>
			<div class="h-grid">
				@foreach(Auth::user()->events()->get() as $event)
					<a
							class="row row--stretch h-grid__item item"
							href="{{ route('event.special', ['event' => $event['id']] ) }}"
					>
						<div class="item__date bkg-red">
							{{  date('d M', strtotime( $event['starttime'])) }}
						</div>
						
						<div class="is-grow item__column">
							<p class="item__title item__text">{{ $event->title }}</p>
							<p class="item__text is-grow">{{ $event->description }}</p>
							<p class="item__text is-row row">Bekijk het event @svg('right-arrow', 'is-small')</p>
						</div>
						<div class="ctn--image item__image">
							<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
						</div>
					</a>
				@endforeach
			</div>
		</section>
	@endif
@endsection