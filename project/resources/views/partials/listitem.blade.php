<div class="list__item item row row--stretch">
	<div class="item__date">
		<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
			<div class="date-field">
				<div>
					@if($event['endtime'])
						{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('j') }} -
						{{ \Jenssegers\Date\Date::parse(strtotime($event['endtime']))->format('j') }}
					@else
						{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('j') }}
					@endif
				</div>
			</div>
			<div class="date-month">
				{{ \Jenssegers\Date\Date::parse(strtotime($event['starttime']))->format('M') }}
			</div>
		</a>
	</div>
	
	<div class="item__content">
		<div class="item__section row row--stretch">
			<h4 class="item__title">
				<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
					{{ $event->title }}
				</a>
			</h4>
			
			<div class="item__actions row">
				<button title="download" class="button is-icon" type="submit">
					@svg('download', 'is-btn')
				</button>
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
		</div>
		
		<div class="item__section row">
			<div class="row">
				@svg('clock')
				18:00
			</div>
			<div class="row">
				@svg('location')
				Leuven
			</div>
		</div>
		<div class="item__text item__section">
			<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
				{{ $event->description }}
			</a>
		</div>
	</div>
	
	<div class="item__image ctn--image">
		<a href={{ route('event.detail', ['event_id' => $event->id]) }}>
			@if(File::exists(public_path() . "/images/" . $event['logo']))
				<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
			@else
				<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
			@endif
		</a>
	</div>
</div>