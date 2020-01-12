@extends('layouts.masterlayout')
@section('title')
	evento
@endsection
@section('content')
	<div class="page-alignment">
		@if(Auth::user())
			@if(Auth::user()->events()->exists())
				<section class="spacing-top-s" id="events">
					<h1>
						Mijn evenementen
					</h1>
					<div class="v-grid">
						@foreach(Auth::user()->events()->get() as $event)
							<a class="v-grid__item item" href="{{ route('event.special', ['event' => $event['id']] ) }}">
								<div class="item__date bkg-red">
									{{  date('d M', strtotime( $event['starttime'])) }}
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
								
								<div class="item__title">
									{{ $event->title }}
								</div>
							</a>
						@endforeach
					</div>
				</section>
			@else
				<section class="spacing-top-s" id="events">
					<h1>
						Mijn evenementen
					</h1>
					<div class="">
						Je hebt nog geen evenementen toegevoegd! <br>
						Voeg snel een evenement toe!
					</div>
				</section>
			@endif
		@else
			<section class="spacing-top-s" id="events">
				Er is iets misgegaan. <br>
				Ben je zeker dat je aangemeld bent?
			</section>
		@endif
	</div>
@endsection