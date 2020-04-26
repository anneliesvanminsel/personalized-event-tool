<div class="card">
	<div class="card__like">
		@if(Auth::user() && $event->users->contains(Auth::user()->id))
			<button title="unlike" class="button is-icon" type="submit">
				@svg('heart-full', 'is-small is-btn')
			</button>
		@else
			<button title="like" class="button is-icon" type="submit">
				@svg('heart-line', 'is-small is-btn')
			</button>
		@endif
	</div>
	<div class="card__image">
		@if(File::exists(public_path() . "/images/" . $event['logo']))
			<img src="{{ asset('images/' . $event['logo']) }}" alt="logo voor {{ $event->title }}">
		@else
			<img src="https://placekitten.com/600/600" alt="logo voor {{ $event->title }}">
		@endif
	</div>
	<div class="card__content">
		<h3 class="card__title">
			{{ $event->title }}
		</h3>
		<div class="card__text row">
			@svg('calendar', 'is-small')
			{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('j') }} -
			{{ \Jenssegers\Date\Date::parse(strtotime($event['endtime']))->format('j F Y') }}
		</div>
		@if($event->address()->exists())
			<div class="card__text row">
				@svg('location', 'is-small')
				{{ $event->address()->first()->locationname }}, {{ $event->address()->first()->city }}
			</div>
		@endif
	</div>
	<div class="card__actions">
		<a class="btn btn--primary" href={{ route('event.detail', ['event_id' => $event->id]) }}>
			Bekijk details
		</a>
	</div>
</div>