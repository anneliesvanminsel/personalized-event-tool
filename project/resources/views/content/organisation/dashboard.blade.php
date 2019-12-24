@extends('layouts.masterlayout')
@section('title')
	evento - dashboard
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			{{ $organisation['name'] }} - Admin
		</h1>
	</section>
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
	<section class="page-alignment spacing-top-m">
		<div class="row row--stretch">
			<h2>
				Mijn evenementen
			</h2>
			<a href="{{ route('event.create', ['organisation_id' => $organisation['id']]) }}" class="btn btn--small">
				Event aanmaken
			</a>
		</div>
		<div class="h-grid">
			@foreach($organisation->events()->get() as $event)
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
					<div class="item__actions row row--stretch">
						<a class="btn is-icon" href={{route('event.update', ['event_id' => $event->id])}}>
							@svg('edit', 'is-small')
						</a>
						<form
							class="form"
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
							method="POST"
							action="{{ route('event.delete', ['event-id' => $event['id'], 'organisation_id' => $organisation['id'] ]) }}"
						>
							{{ csrf_field() }}
							<button class="btn is-icon" type="submit">
								@svg('delete', 'is-small')
							</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</section>
@endsection