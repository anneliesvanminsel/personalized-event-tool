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
			@php
				$events = $organisation->events()->orderBy('starttime', 'ASC')->paginate(10);
			@endphp
			@foreach($events as $event)
				<div class="h-grid__item item row row--stretch event {{ $event['starttime'] > \Carbon\Carbon::now() ? 'valid' : 'invalid'}}">
					
					<div class="item__date" style="background-color: {{ $organisation['bkgcolor'] }}; color: {{ $organisation['textcolor'] }}">
						{{  date('d M', strtotime( $event['starttime'])) }}
					</div>
					
					<a class="item__image ctn--image" href={{route('event.detail', ['event_id' => $event->id])}}>
						@if(File::exists(public_path() . "/images/" . $event['logo']))
							<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
						@else
							<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
						@endif
					</a>
					
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
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt {{ $event['status'] === 0 ? 'zichtbaar maken' : 'onzichtbaar maken' }}?');"
							method="POST"
							action="{{ route('event.publish', ['event-id' => $event['id'], 'organisation_id' => $organisation['id'] ]) }}"
						>
							{{ csrf_field() }}

							<button title="set visiblility" class="btn is-icon" type="submit">
								@if($event['status'] === 0)
									@svg('hide', 'is-small')
								@else
									@svg('view', 'is-small')
								@endif
							</button>
						</form>
						<a title="edit event information" class="btn is-icon" href={{route('event.update', ['event_id' => $event->id])}}>
							@svg('edit', 'is-small')
						</a>
						<a title="edit event settings" class="btn is-icon" href={{route('event.edit.settings', ['event_id' => $event->id])}}>
							@svg('calendar (2)', 'is-small')
						</a>
						<form
							class="form"
							onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
							method="POST"
							action="{{ route('event.delete', ['event_id' => $event['id'], 'organisation_id' => $organisation['id'] ]) }}"
						>
							{{ csrf_field() }}
							<button class="btn is-icon" type="submit">
								@svg('delete', 'is-small')
							</button>
						</form>
					</div>
				</div>
			@endforeach
			<div>
				{{ $events->links() }}
			</div>
		</div>
	</section>
@endsection