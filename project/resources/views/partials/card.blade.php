<div class="card">
	<div class="card__like">
		<form
			class="form"
			method="POST"
			action="{{ route('event.like', ['event-id' => $event['id'] ]) }}"
		>
			{{ csrf_field() }}
			@if(Auth::user() && $event->users->contains(Auth::user()->id))
				<button title="unlike" class="button is-icon" type="submit">
					@svg('heart-full', 'is-btn is-heart')
				</button>
			@else
				<button title="like" class="button is-icon" type="submit">
					@svg('heart-line', 'is-btn is-heart')
				</button>
			@endif
		</form>
	</div>
	<div class="card__image">
		@if(File::exists(public_path() . "/images/" . $event['image']))
			<img src="{{ asset('images/' . $event['image']) }}" alt="logo voor {{ $event->title }}">
		@else
			<img src="https://placekitten.com/600/600" alt="logo voor {{ $event->title }}">
		@endif
	</div>
	<div class="card__content">
		<h4 class="card__title">
			{{ $event->title }}
		</h4>
		<div class="card__text row">
			@svg('calendar')
			@if($event['endtime'])
				{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('j') }} -
				{{ \Jenssegers\Date\Date::parse(strtotime($event['endtime']))->format('j F Y') }}
			@else
				{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('j F Y') }}
			@endif
		</div>
		@if($event->address()->exists())
			<div class="card__text row is-short">
				@svg('location')
				<span>
					{{ $event->address()->first()->city }}
				</span>
			</div>
		@endif
	</div>
	<div class="card__actions">
		<a class="btn btn--primary" href={{ route('event.detail', ['event_id' => $event->id]) }}>
			event details
		</a>
	</div>
</div>