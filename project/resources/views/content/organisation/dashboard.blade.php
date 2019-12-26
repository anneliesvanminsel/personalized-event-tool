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
			@foreach($organisation->events()->orderBy('starttime', 'ASC')->get() as $event)
				<div class="h-grid__item item row row--stretch">

					<div class="item__date" style="background-color: {{ $organisation['bkgcolor'] }}; color: {{ $organisation['textcolor'] }}">
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

					<div class="item__content">
						<div class="item__title">
							{{ $event->title }}
						</div>
						<div class="item__text">
							{{ $event->type }}
						</div>
					</div>

					<div class="item__actions row row--stretch">
						<form
							class="form"
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt publishen?');"
							method="POST"
							action="{{ route('event.update', ['event-id' => $event['id'], 'organisation_id' => $organisation['id'] ]) }}"
						>
							{{ csrf_field() }}

							<button class="btn is-icon" type="submit">
								@if($event['status'] === 0)
									@svg('hide', 'is-small')
								@else
									@svg('view', 'is-small')
								@endif
							</button>
						</form>
						<a class="btn is-icon" href={{route('event.update', ['event_id' => $event->id])}}>
							@svg('edit', 'is-small')
						</a>
						<a class="btn is-icon" href={{route('event.update', ['event_id' => $event->id])}}>
							@svg('calendar (2)', 'is-small')
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