<div class="card">
	<div class="card__like row row--center">
		@if(Auth::user() && $event->organisation_id === Auth::user()->organisation_id)
			@php
				$organisation = $event->organisation;
			@endphp
			<div class="item__actions row row--stretch">
				<form
					class="form"
					onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt {{ $event['published'] === 0 ? 'zichtbaar maken' : 'onzichtbaar maken' }}?');"
					method="POST"
					action="{{ route('event.publish', ['organisation_id' => $organisation['id'], 'event-id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					
					<button title="set visiblility" class="button is-icon" type="submit">
						@if($event['published'] === 0)
							@svg('hide', 'is-btn')
						@else
							@svg('view', 'is-btn')
						@endif
					</button>
				</form>
				<a title="edit event information" class="button is-icon" href={{route('event.update', ['organisation_id' => $organisation['id'], 'event_id' => $event->id])}}>
					@svg('edit', 'is-btn')
				</a>
				<a title="edit event settings" class="button is-icon" href={{route('event.edit.settings', ['organisation_id' => $organisation['id'], 'event_id' => $event->id])}}>
					@svg('tools', 'is-btn')
				</a>
				<form
					class="form"
					onsubmit="return confirm('Ben je zeker dat je {{ $event['title'] }} voor alle organisatoren wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');"
					method="POST"
					action="{{ route('event.delete', ['organisation_id' => $organisation['id'], 'event_id' => $event['id'] ]) }}"
				>
					{{ csrf_field() }}
					<button class="button is-icon" type="submit">
						@svg('delete', 'is-btn')
					</button>
				</form>
			</div>
		@else
			<!--button title="download" class="button is-icon" onclick="postAjax('user/event/{{$event->id}}/like')">
				@if(Auth::user() && $event->savedusers->contains(Auth::user()->id))
					@svg('check', 'is-btn is-white')
				@else
					@svg('download', 'is-btn is-white')
				@endif
			</button-->
			
			@if(Auth::user())
				<button title="like" class="button is-icon" onclick="postAjax('/user/event/{{$event->id}}/like', null, this)">
			@else
				<a title="like" class="button is-icon" href="{{ route('login') }}">
			@endif
				@if(Auth::user() && $event->favusers->contains(Auth::user()->id))
					@svg('heart-full', 'is-btn is-heart full')
				@else
					@svg('heart-full', 'is-btn is-heart empty')
				@endif
			@if(Auth::user())
				</button>
			@else
				</a>
			@endif
		@endif
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
			@if($event['enddate'])
				{{ \Jenssegers\Date\Date::parse(strtotime($event['startdate']))->format('j') }} -
				{{ \Jenssegers\Date\Date::parse(strtotime($event['enddate']))->format('j F Y') }}
			@else
				{{ \Jenssegers\Date\Date::parse(strtotime($event['startdate']))->format('j F Y') }}
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
		@if(strpos(Route::currentRouteName(), 'user.favorites') === 0)
			<a class="btn btn--primary" href={{ route('event.special', ['event_id' => $event->id]) }}>
				event details
			</a>
		@else
			<a class="btn btn--primary" href={{ route('event.detail', ['event_id' => $event->id]) }}>
				event details
			</a>
		@endif
	</div>
</div>